<div class="card">
    <div class="card-body p-2">
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="{{ $tableId ?? 'leads_table' }}">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        @foreach($columns as $column)
                            <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                        @endforeach
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to format date
    function formatDate(data) {
        return moment(data).format('DD MMM YYYY, hh:mm A');
    }

    // Initialize DataTable
    const tableId = {!! json_encode($tableId ?? 'leads_table') !!};
    const leads = {!! json_encode($leads) !!};
    const columns = {!! json_encode($columns) !!};

    const dataTableColumns = [
        ...columns.map(column => ({
            data: column,
            render: function(data, type, row) {
                if (column === 'created_at') {
                    return formatDate(data);
                }
                return data || 'N/A';
            }
        })),
        {
            data: null,
            orderable: false,
            className: 'text-end',
            render: function(data, type, row) {
                return `
                    <button type="button" 
                            class="btn btn-sm btn-light-primary view-lead"
                            data-lead='${JSON.stringify(row)}'>
                        <i class="bi bi-eye"></i> View
                    </button>
                `;
            }
        }
    ];

    const table = $(`#${tableId}`).DataTable({
        data: leads,
        columns: dataTableColumns,
        order: [[0, 'desc']],
        pageLength: 25,
        responsive: true,
        searching: true,
        info: true,
        lengthChange: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
             '<"row"<"col-sm-12"tr>>' +
             '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            search: "Search:",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });

    // Handle view lead button click
    $(`#${tableId}`).on('click', '.view-lead', function() {
        const leadData = JSON.parse($(this).attr('data-lead'));
        
        // Create modal content
        const modalContent = `
            <div class="modal fade" id="viewLeadModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Lead Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ${Object.entries(leadData).map(([key, value]) => `
                                <div class="mb-3">
                                    <strong>${key.replace('_', ' ').toUpperCase()}:</strong>
                                    <span>${key === 'created_at' ? formatDate(value) : (value || 'N/A')}</span>
                                </div>
                            `).join('')}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Remove existing modal if any
        $('#viewLeadModal').remove();
        
        // Add new modal to body
        $('body').append(modalContent);
        
        // Show the modal
        new bootstrap.Modal('#viewLeadModal').show();
    });
});
</script>
@endpush

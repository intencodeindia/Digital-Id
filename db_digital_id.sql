-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 01:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_digital_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_time` datetime NOT NULL,
  `duration_minutes` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `service_id`, `appointment_time`, `duration_minutes`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-11-08 13:40:00', 60, 'pending', 'Hellow', '2024-11-28 22:36:09', '2024-11-28 22:36:09'),
(2, 2, 1, '2024-11-30 14:44:00', 60, 'pending', 'gfgfgf', '2024-11-28 22:39:16', '2024-11-28 22:39:16'),
(3, 2, 2, '2028-11-09 14:45:00', 60, 'cancelled', 'fdfd', '2024-11-28 22:40:30', '2024-11-28 22:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_settings`
--

CREATE TABLE `appointment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `available_days` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`available_days`)),
  `working_hours_start` time NOT NULL,
  `working_hours_end` time NOT NULL,
  `slot_duration` int(11) NOT NULL DEFAULT 30,
  `break_time` int(11) NOT NULL DEFAULT 15,
  `max_appointments` int(11) NOT NULL DEFAULT 10,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_organizations`
--

CREATE TABLE `custom_organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_organizations`
--

INSERT INTO `custom_organizations` (`id`, `name`, `logo`, `address`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Intencode India private Limited', NULL, 'Hyderabad', 11, NULL, NULL),
(2, 'Intencode India', 'logos/H51OnqD6NoKZawIgWRDvapjHVRUAwXnqE7QWj2aw.png', 'Testing', 11, '2024-12-02 06:43:57', '2024-12-02 06:43:57'),
(3, 'Intencode India', 'logos/NukOZZznwsAjEDFqG5MjwK3xFb4PQiqi3672XByT.png', 'Testing', 11, '2024-12-02 06:44:32', '2024-12-02 06:44:32'),
(4, 'Testing', 'logos/ZZUoluBogVjvsd7Q4XEw7HLf7PMl9GmsEV1ewyFm.jpg', 'Heloow', 11, '2024-12-02 06:47:48', '2024-12-02 06:47:48'),
(5, 'Hello', 'uploads/logos/kY3YaeGFxhxfgYk1Gk7hjM7Dlplxsqap0ac2b40z.png', 'Testing', 11, '2024-12-02 06:48:56', '2024-12-02 06:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Human Resources', 3, 'Responsible for recruitment, employee relations, and organizational development.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(2, 'Finance', 3, 'Handles the financial planning, accounting, and financial reporting for the company.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(3, 'IT Support', 3, 'Provides technical assistance to staff and manages the company\'s IT infrastructure.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(4, 'Sales', 3, 'Manages the sales strategy and works to generate revenue through new and existing customers.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(5, 'Marketing', 0, 'Focuses on promoting the company\'s products and services and managing brand image.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(6, 'Customer Service', 0, 'Responsible for assisting customers with inquiries, complaints, and support.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(7, 'Product Development', 0, 'Designs and develops new products, services, and solutions for the company.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(8, 'Legal', 0, 'Handles legal matters, including contracts, compliance, and dispute resolution.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(9, 'Operations', 0, 'Oversees day-to-day business activities and ensures smooth operations across departments.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(10, 'Research & Development', 0, 'Works on innovating and creating new products, services, or solutions for the company.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(11, 'Procurement', 0, 'Manages the purchasing of materials, equipment, and services required for the company.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(12, 'Quality Assurance', 0, 'Ensures that products and services meet quality standards before reaching customers.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(13, 'Logistics', 0, 'Manages the transportation and storage of goods and products within the company\'s supply chain.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(14, 'Compliance', 0, 'Monitors and ensures that the company adheres to all applicable laws and industry standards.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(15, 'Public Relations', 0, 'Manages the company\'s external communications, including media relations and public image.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(16, 'Training & Development', 0, 'Focuses on employee development, providing training programs for skill enhancement.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(17, 'Business Development', 0, 'Identifies growth opportunities and strategic partnerships to drive the company\'s expansion.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(18, 'Administration', 0, 'Provides administrative support and manages day-to-day business functions within the organization.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(19, 'Supply Chain', 0, 'Oversees the production, procurement, and distribution of goods within the company\'s supply chain.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(20, 'Facilities Management', 0, 'Manages the company\'s physical assets, including buildings and office maintenance.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(21, 'Security', 0, 'Ensures the safety and security of the company\'s assets, employees, and data.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(22, 'Corporate Strategy', 0, 'Develops long-term strategies and business plans to ensure the company\'s success and growth.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(23, 'Investor Relations', 0, 'Communicates with shareholders, analysts, and investors regarding the company\'s performance.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(24, 'Sustainability', 0, 'Promotes environmental and social responsibility within the company and its operations.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(25, 'Business Intelligence', 0, 'Analyzes data and market trends to provide insights for business decision-making.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(26, 'Digital Transformation', 0, 'Leads initiatives to integrate new technologies and digital processes into the business.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(27, 'Internal Audit', 0, 'Assesses the company’s internal processes, ensuring compliance and operational efficiency.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(28, 'Customer Success', 0, 'Works closely with customers to ensure they achieve their desired outcomes using company products.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(29, 'Creative Services', 0, 'Provides design, branding, and content creation to support the company\'s marketing and communications efforts.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(30, 'Strategy & Planning', 0, 'Focuses on setting long-term goals and formulating plans to meet business objectives.', '2024-12-05 03:50:15', '2024-12-05 03:50:15'),
(31, 'Corporate Communications', 0, 'Handles internal and external communication, ensuring alignment with company objectives.', '2024-12-05 03:50:15', '2024-12-05 03:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Chief Executive Officer', 'Responsible for the overall strategic direction and operations of the company.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(2, 'Chief Operating Officer', 'Oversees the daily operations of the company and implements its business strategies.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(3, 'Chief Financial Officer', 'Manages the company’s finances, including budgeting, accounting, and financial planning.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(4, 'Chief Marketing Officer', 'Leads the marketing department, developing strategies to promote the company\'s brand and products.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(5, 'Chief Technology Officer', 'Oversees all technology-related aspects of the company, ensuring the alignment of tech strategy with business goals.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(6, 'Chief Human Resources Officer', 'Leads HR functions including recruitment, employee relations, and talent development.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(7, 'Vice President of Sales', 'Directs the sales team, focusing on achieving revenue goals and maintaining customer relationships.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(8, 'Vice President of Marketing', 'Oversees marketing operations, developing strategies to build the company’s presence and reach in the market.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(9, 'Vice President of Operations', 'Manages operational processes, ensuring smooth and efficient day-to-day activities of the business.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(10, 'Vice President of Finance', 'Responsible for managing financial planning, reporting, and analysis within the company.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(11, 'Director of Human Resources', 'Leads HR initiatives, including employee development, retention, and organizational culture programs.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(12, 'Director of Sales', 'Manages the sales department, develops sales strategies, and leads efforts to achieve business targets.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(13, 'Director of Marketing', 'Responsible for marketing campaigns, brand development, and market research strategies.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(14, 'Director of IT', 'Leads the company’s IT strategy and infrastructure, ensuring robust technology systems and support.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(15, 'Director of Product Management', 'Responsible for managing the product lifecycle, from ideation to execution, ensuring products meet customer needs.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(16, 'Product Manager', 'Oversees product development, collaborating with teams to deliver market-leading products.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(17, 'Sales Manager', 'Supervises sales representatives and implements strategies to achieve sales targets and revenue growth.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(18, 'Marketing Manager', 'Leads the marketing team in executing campaigns and strategies to promote the company’s products and services.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(19, 'HR Manager', 'Manages HR functions such as recruitment, employee relations, and compliance with labor laws.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(20, 'Operations Manager', 'Ensures efficient day-to-day operations within the company by overseeing logistics, facilities, and staffing.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(21, 'Finance Manager', 'Oversees financial planning, budgeting, and reporting to ensure financial health and growth of the company.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(22, 'IT Manager', 'Manages the IT team and ensures the company’s technology infrastructure is aligned with business needs.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(23, 'Customer Service Manager', 'Leads customer support teams, ensuring timely resolution of customer inquiries and satisfaction.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(24, 'Business Development Manager', 'Identifies business opportunities, builds relationships with clients, and drives growth strategies.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(25, 'Senior Software Engineer', 'Develops and maintains high-quality software systems, working on complex coding and system design tasks.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(26, 'Senior Marketing Specialist', 'Develops and implements marketing strategies to increase brand awareness and product demand.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(27, 'Senior Product Manager', 'Leads product strategy and oversees product development, ensuring products meet market demands and company goals.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(28, 'Senior Financial Analyst', 'Provides detailed financial analysis and recommendations to support business decisions.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(29, 'Senior Sales Representative', 'Handles key accounts and major sales negotiations, fostering long-term client relationships.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(30, 'Senior HR Specialist', 'Handles employee relations, performance management, and HR policy implementation within the company.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(31, 'Software Developer', 'Writes, tests, and maintains software applications, ensuring functionality and scalability.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26'),
(32, 'Marketing Specialist', 'Assists in marketing activities, including research, content creation, and digital marketing campaigns.', 0, '2024-12-05 03:59:26', '2024-12-05 03:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `documentId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` enum('pdf','docx','xlsx','jpg','png') NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `documentId`, `name`, `file_path`, `file_type`, `document_type`, `expiry_date`, `additional_info`, `added_at`, `created_at`, `updated_at`) VALUES
(1, 2, '85520213252', 'Adhar Card', 'document-1731846596.png', 'png', 'national_id', '2024-11-17', NULL, '2024-11-17 06:59:56', '2024-11-17 06:59:56', '2024-11-17 06:59:56'),
(2, 7, 'testing', 'Testing', 'documents/document-1731990066.pdf', 'pdf', 'national_id', '2024-11-15', 'testing', '2024-11-18 22:51:07', '2024-11-18 22:51:07', '2024-11-18 22:51:07'),
(3, 2, '7451 520 3652', 'Adhar Card', 'document-1732767584.pdf', 'pdf', 'credit_card', '2024-11-16', 'fgfg', '2024-11-27 22:49:44', '2024-11-27 22:49:44', '2024-11-27 22:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `work_type` enum('Full Time','Part Time') DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `user_id`, `department`, `designation`, `joining_date`, `profile_photo`, `work_type`, `relationship`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, '100100', 4, 'Desktop', 'ggg', '2024-12-12', 'fgfgf', 'Full Time', 'fgfgf', NULL, NULL, NULL),
(2, '100100', 13, 'Desktop', 'ggg', '2024-12-12', 'fgfgf', 'Full Time', 'fgfgf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entry_logs`
--

CREATE TABLE `entry_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL,
  `logged_in_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entry_logs`
--

INSERT INTO `entry_logs` (`id`, `user_id`, `department`, `logged_in_at`, `created_at`, `updated_at`) VALUES
(1, 13, 'gfgfg', '2024-12-05 11:34:51', NULL, NULL),
(2, 13, 'fgfgd', '2024-12-05 11:34:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entry_permissions`
--

CREATE TABLE `entry_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entry_permissions`
--

INSERT INTO `entry_permissions` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `user_id`, `name`, `email`, `mobile`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 'ghgh', 'ghgh@ggh.fhfh', '54546565', '654654', 1, '2024-12-05 04:56:14', NULL),
(2, 4, '654654', '6546546', '54654', '54654', 1, '2024-12-05 04:56:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_12_135824_create_documents_table', 1),
(5, '2024_11_12_152715_create_services_table', 1),
(6, '2024_11_13_031800_create_portfolios_table', 1),
(7, '2024_11_14_121355_create_appointments_table', 1),
(8, '2024_11_15_033816_create_appointment_settings_table', 1),
(9, '2024_11_16_070320_create_roles_and_pivot_tables', 1),
(10, '2024_11_18_101147_create_vcard_details_table', 2),
(11, '2024_11_29_043054_create_contacts_table', 3),
(12, '2024_12_02_103632_create_custom_organizations_table', 4),
(13, '2024_12_05_031703_create_employees_table', 5),
(14, '2024_12_05_034508_create_departments_table', 6),
(15, '2024_12_05_035315_create_designations_table', 7),
(16, '2024_12_05_044228_create_leads_table', 8),
(17, '2024_12_05_095835_create_entry_logs_table', 9),
(18, '2024_12_05_104452_create_entry_permissions_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('video','image') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `type`, `title`, `description`, `price`, `file_path`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'image', 'E-commerce Platform for XYZ Store', 'Developed a full-featured e-commerce platform that enables users to browse products, place orders, and make secure payments. The platform includes a product catalog, cart, checkout flow, and user authentication.', 10000.00, 'file-1731846694.jpg', 2, '2024-11-17 07:01:34', '2024-11-17 07:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'System Administrator', 1, '2024-11-16 03:19:48', '2024-11-16 03:19:48'),
(2, 'User', 'user', 'Regular User', 1, '2024-11-16 03:19:48', '2024-11-16 03:19:48'),
(3, 'Organization', 'organization', 'Organization Account', 1, '2024-11-16 03:19:48', '2024-11-16 03:19:48'),
(4, 'Employee', 'employee', 'Employee Account', 1, '2024-11-16 03:19:48', '2024-11-16 03:19:48'),
(5, 'Family Member', 'familymember', 'Family Member Account', 1, '2024-11-16 03:19:48', '2024-11-16 03:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-11-16 03:19:49', '2024-11-16 03:19:49'),
(2, 2, '2024-11-16 03:19:49', '2024-11-16 03:19:49'),
(3, 3, '2024-11-16 03:19:49', '2024-11-16 03:19:49'),
(4, 4, '2024-11-16 03:19:49', '2024-11-16 03:19:49'),
(5, 5, '2024-11-16 03:19:49', '2024-11-16 03:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `description`, `thumbnail`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 'Custom Software Development', 'Develop custom software solutions from scratch, including desktop, web, and mobile applications. Tailored to client needs and specifications.', 'thumbnail-1731846437.png', 100, '2024-11-17 06:57:17', '2024-11-17 06:57:17'),
(2, 2, 'Web Development', 'Build responsive, high-performance websites using the latest technologies. Includes frontend (HTML, CSS, JavaScript) and backend (PHP, Python, Node.js) development, CMS integration (WordPress, Joomla), and eCommerce solutions (Shopify, WooCommerce).', 'thumbnail-1731846466.jpg', 11100, '2024-11-17 06:57:46', '2024-11-17 06:57:46'),
(3, 2, 'Mobile App Development (iOS/Android)', 'Design and develop mobile applications for iOS and Android, including cross-platform development using tools like React Native, Flutter, or native development (Swift, Kotlin).', 'thumbnail-1731846490.png', 20000, '2024-11-17 06:58:10', '2024-11-17 06:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eWvAjcRwSEMpUNTM34b9PydFn3ugTuW7YMfv1Byy', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YToxMjp7czo2OiJfdG9rZW4iO3M6NDA6Ikl2VHg0T09yOWdIYmdodHh2Q2c1TmRwNnYyQzR2NXhJSzZPbHVWdVAiO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9lbXBsb3llZXMiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2VtcGxveWVlL2xlYWRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjc6InVzZXJfaWQiO2k6NDtzOjk6InVzZXJfbmFtZSI7czoxMzoiRW1wbG95ZWUgVXNlciI7czoxMDoidXNlcl9lbWFpbCI7czoyMDoiZW1wbG95ZWVAZXhhbXBsZS5jb20iO3M6OToidXNlcl9yb2xlIjtzOjg6ImVtcGxveWVlIjtzOjEwOiJkaWdpdGFsX2lkIjtzOjEyOiIwMTI1MDIxOTAyNDIiO3M6MTI6InJlbGF0aW9uc2hpcCI7czo4OiJlbXBsb3llZSI7czo5OiJwYXJlbnRfaWQiO2k6Mzt9', 1733400005),
('G7wVSRJIry3io0qxs59yZT7tJ7ZijK61MVo4r1Ll', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToxMTp7czo2OiJfdG9rZW4iO3M6NDA6Ik9RWkxsbEVFdFJSMWNRaFVka2cweWcwU212eXppcGRxd1d1SmljRG4iO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZW50cnktbG9ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo3OiJ1c2VyX2lkIjtpOjM7czo5OiJ1c2VyX25hbWUiO3M6MzE6IkludGVuY29kZSBJbmRpYSBQcml2YXRlIExpbWl0ZWQiO3M6MTA6InVzZXJfZW1haWwiO3M6MTU6Im9yZ0BleGFtcGxlLmNvbSI7czo5OiJ1c2VyX3JvbGUiO3M6MTI6Im9yZ2FuaXphdGlvbiI7czoxMDoiZGlnaXRhbF9pZCI7czoxMjoiNjgxNzU1NTIzNzk5IjtzOjEyOiJyZWxhdGlvbnNoaXAiO047czo5OiJwYXJlbnRfaWQiO047fQ==', 1733399996);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','organization','employee','familymember') NOT NULL DEFAULT 'user',
  `digital_id` varchar(255) NOT NULL DEFAULT '870542275829',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `username` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `organization_logo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `digital_id`, `status`, `username`, `profile_photo`, `bio`, `phone`, `relationship`, `parent_id`, `organization_logo`, `remember_token`, `email_verified_link`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', '2024-11-16 03:19:48', '$2y$12$pa2t4C4C1ce6C0bCvhq8aehSPXudmnJ4fMuvaSRt9I93sb.dCGgrq', 'admin', '830447577402', 1, 'admin', NULL, 'System Administrator', '+1234567890', NULL, NULL, NULL, 'vN2KwoMJS0DmtTsUOU3RgJ5kmIw9tFUC6YbcmKoH22lGAGCepXOlyVotnXLX', NULL, '2024-11-16 03:19:49', '2024-11-16 03:19:49'),
(2, 'Sunil Khobragade', 'user@example.com', '2024-11-16 03:19:49', '$2y$12$YGH1k7yaES1jNlSOI.yaYeR.y9IYvbJJIrT28VK57S8Ng3d6CX.Z2', 'user', '138395885389', 1, 'user', '1732769563.jpeg', 'I am a passionate developer with a love for technology and coding', '9876543210', NULL, NULL, 'logo-oops.png', 'bWrAVlMRBlRUuCUZGj6ek8oqPOQ25aGLMbEqQbBLwf8fCEz1OH1eIV2U3l7d', NULL, '2024-11-16 03:19:49', '2024-11-27 23:22:43'),
(3, 'Intencode India Private Limited', 'org@example.com', '2024-11-16 03:19:49', '$2y$12$u4OIxlXKozpnlc8onIfdC.mFFvNblwgMK0GJ/k2vvRfsc2FwpYHBe', 'organization', '681755523799', 1, 'organization', '1733313160.png', 'Intencode is an iconic software development company providing next-gen software development services and gained 300+ satisfied customers from 50+ countries.', '+7498950562', NULL, NULL, NULL, 'bwBwqcqu3ON5bvwJxZIVtN2m2ssPQAsCQWlCR2bgrPHuBY7UAI541squ307c', NULL, '2024-11-16 03:19:49', '2024-12-04 06:22:40'),
(4, 'Amir ALi', 'employee@example.com', '2024-11-16 03:19:49', '$2y$12$wVC9xC/I7FFOv2faywNf0O61p8MVYCsBA7KR9ODhrHLtFuYnhjN0S', 'employee', '012502190242', 1, 'employee', '1733399359.jpg', 'Amir ali is a skilled software engineer with over 5 years of experience in developing scalable applications. Proficient in languages like Java, Python, and JavaScript, he excels in both front-end and back-end development. John is passionate about writing clean, efficient code and thrives in collaborative, fast-paced environments. He has a strong focus on problem-solving, debugging, and optimizing software to meet user needs. Outside of work, John enjoys exploring new technologies and contributing to open-source projects.', '+749895562120', 'employee', 3, NULL, 'aLV4qfLtSB', NULL, '2024-11-16 03:19:49', '2024-12-05 06:19:19'),
(5, 'Family Member', 'family@example.com', '2024-11-16 03:19:49', '$2y$12$XEWtrO0h4D.Mv6ECMdPPAebL4lGnhJx6VF9h.6KELvj/qTHOY48du', 'familymember', '436695435118', 1, 'family', NULL, 'Family Member Account', '+1777888999', 'spouse', 2, NULL, 'rAWKztbKEU', NULL, '2024-11-16 03:19:49', '2024-11-16 03:19:49'),
(6, 'Naman Khobragade', 'naman@gmail.com', NULL, '$2y$12$uk9GWqseba.CHNa/VBniJ.aCM9O8M1ymrfFGz7rsXjiK7HvA9rZ..', 'familymember', '528071609963', 0, 'namankhobragade', 'photo-1731846553.jpeg', NULL, '7485963201', 'other', 2, NULL, NULL, NULL, '2024-11-17 06:58:57', '2024-11-17 06:59:13'),
(7, 'Saber', 'saber@kenzorganic.com', '2024-11-16 03:19:49', '$2y$12$YGH1k7yaES1jNlSOI.yaYeR.y9IYvbJJIrT28VK57S8Ng3d6CX.Z2', 'user', '138395885089', 1, 'kenzorganic', 'saber.jpg', 'Regular User Account', '+1987654321', NULL, NULL, NULL, 'jYaNqYN7N78ZOWQphyGKoas49SVjRkTgJ6JMLGDbPwXBh63wUs1aQaWgKQQq', NULL, '2024-11-16 03:19:49', '2024-11-16 03:19:49'),
(9, 'Naman Khobragade', 'naman123@gmail.com', NULL, '$2y$12$KbE8N/z4RWONge7PXzE.KuylvUWYU.Yy.c8nJ1FItG9DUi2eRvrFO', 'user', '095478322049', 1, 'namanmahi', '1733039877.png', 'As a passionate cybersecurity expert, I am dedicated to safeguarding digital landscapes and ensuring the security and privacy of individuals and organizations. With a strong foundation in [mention key skills or certifications, like ethical hacking, network security, penetration testing], I specialize in identifying vulnerabilities, implementing robust security measures, and responding to emerging cyber threats. My goal is to stay ahead of the curve in this ever-evolving field and contribute to building a safer digital world. When I’m not securing systems or researching the latest cybersecurity trends, I’m actively engaged in [mention a hobby or side project]. Let’s connect and collaborate to strengthen our digital security!', '+917498950562', NULL, NULL, NULL, NULL, NULL, '2024-11-30 03:57:21', '2024-12-01 02:27:57'),
(10, 'Naman Khobragade', 'kohimo6684@jonespal.com', NULL, '$2y$12$o4IUGBBerP29zbDcMGt8LuY9AWU8Qqg5vdgz23f/f.MZkiP4kVe5i', 'user', '573935487594', 1, 'kohimo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-01 04:55:53', '2024-12-01 04:55:53'),
(11, 'Sunil Khobragade', 'wijey89510@jonespal.com', '2024-12-02 00:32:10', '$2y$12$W9zR09S3B7SkgH/hyVmoJuBs.qIysy3IkQRcaB4iOvjlcMTl7rB7S', 'user', '544921633784', 1, 'sunil', '1733133115.png', NULL, '7498950562', NULL, NULL, NULL, NULL, NULL, '2024-12-01 23:01:13', '2024-12-02 04:21:55'),
(13, 'Employee User 1', 'employee@example.com1', '2024-11-16 03:19:49', '$2y$12$wVC9xC/I7FFOv2faywNf0O61p8MVYCsBA7KR9ODhrHLtFuYnhjN0S', 'employee', '012502190200', 1, 'employee1', NULL, 'Employee Account', '+1555666777', 'employee', 3, NULL, 'aLV4qfLtSB', NULL, '2024-11-16 03:19:49', '2024-11-16 03:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `vcard_details`
--

CREATE TABLE `vcard_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `social_media_facebook` varchar(255) DEFAULT NULL,
  `social_media_twitter` varchar(255) DEFAULT NULL,
  `social_media_linkedin` varchar(255) DEFAULT NULL,
  `social_media_instagram` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vcard_details`
--

INSERT INTO `vcard_details` (`id`, `user_id`, `address`, `organization`, `title`, `website`, `social_media_facebook`, `social_media_twitter`, `social_media_linkedin`, `social_media_instagram`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, '1234, Developer Street, Tech City, India', 'Tech Solutions Pvt Ltd', 'Software Engineer', 'https://www.sunilkhobragade.com', 'https://facebook.com/sunil.khobragade', 'https://twitter.com/sunilkhobragade', 'https://linkedin.com/in/sunilkhobragade', 'https://instagram.com/sunilkhobragade', 'This is a sample note for John Doe.', '2024-11-18 10:16:23', '2024-11-27 22:46:03'),
(2, 7, '123 Main St, Example City', 'Example Corp', 'Software Engineer', 'https://johndoe.com', 'https://facebook.com/johndoe', 'https://twitter.com/johndoe', 'https://linkedin.com/in/johndoe', 'https://instagram.com/johndoe', 'This is a sample note for John Doe.', '2024-11-18 10:16:23', '2024-11-18 10:16:23'),
(3, 9, '44, Hyderabad, TG India 500044', 'Intencode India Private Limited', 'Software Engineer', 'https://namanmahi.in/', 'https://namanmahi.in/', 'https://namanmahi.in/', 'https://namanmahi.in/', 'https://namanmahi.in/', 'This is a sample note for John Doe.', '2024-11-18 10:16:23', '2024-12-01 02:26:43'),
(4, 11, 'Hyderabad India', 'Intencode India Private Limited', 'Full Stack developer', 'http://localhost:8000/#pricing', NULL, NULL, NULL, NULL, NULL, '2024-12-01 23:01:13', '2024-12-02 04:31:45'),
(5, 3, 'Building, First floor, Amrutha Arcade, 3-3-50, Kachiguda Station Rd, opposite Venkataramana theatre, Sai Nanditha Enclave, Kutbi Guda, Kachiguda, Hyderabad, Telangana 500027', 'Intencode India Private Limited 1', 'Organization title', 'https://intencode.com/', 'https://www.facebook.com/people/Intencode/61566280256485/', 'https://x.com/intencode', NULL, 'https://www.instagram.com/intencode/', NULL, '2024-12-04 05:59:07', '2024-12-04 07:46:20'),
(6, 4, 'Amrutha Arcade, 3-3-50,  Kachiguda, Hyderabad, Telangana 500027', 'Intencode India Private Litimed', 'Software Engineer', 'https://intencode.com/', NULL, NULL, NULL, NULL, NULL, '2024-12-05 06:18:57', '2024-12-05 06:18:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

--
-- Indexes for table `appointment_settings`
--
ALTER TABLE `appointment_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_organizations`
--
ALTER TABLE `custom_organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_organizations_created_by_foreign` (`created_by`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documents_documentid_unique` (`documentId`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `entry_logs`
--
ALTER TABLE `entry_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entry_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `entry_permissions`
--
ALTER TABLE `entry_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entry_permissions_user_id_foreign` (`user_id`),
  ADD KEY `entry_permissions_department_id_foreign` (`department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolios_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `vcard_details`
--
ALTER TABLE `vcard_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vcard_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment_settings`
--
ALTER TABLE `appointment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_organizations`
--
ALTER TABLE `custom_organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entry_logs`
--
ALTER TABLE `entry_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entry_permissions`
--
ALTER TABLE `entry_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vcard_details`
--
ALTER TABLE `vcard_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_settings`
--
ALTER TABLE `appointment_settings`
  ADD CONSTRAINT `appointment_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `custom_organizations`
--
ALTER TABLE `custom_organizations`
  ADD CONSTRAINT `custom_organizations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `entry_logs`
--
ALTER TABLE `entry_logs`
  ADD CONSTRAINT `entry_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `entry_permissions`
--
ALTER TABLE `entry_permissions`
  ADD CONSTRAINT `entry_permissions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entry_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vcard_details`
--
ALTER TABLE `vcard_details`
  ADD CONSTRAINT `vcard_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

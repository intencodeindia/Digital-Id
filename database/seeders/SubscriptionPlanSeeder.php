<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubscriptionPlan;

class SubscriptionPlanSeeder extends Seeder
{
    public function run()
    {
        SubscriptionPlan::create([
            'name' => 'Premium Plan',
            'price' => 99.00,
            'billing_interval' => 'month',
            'description' => 'Best for professionals',
            'features' => [
                'Unlimited Digital Cards',
                'Advanced Analytics',
                'Custom Branding',
                'Priority Support',
                'API Access',
                'Team Management'
            ],
            'is_active' => true,
            'trial_days' => 15
        ]);

        SubscriptionPlan::create([
            'name' => 'Business Plan',
            'price' => 199.00,
            'billing_interval' => 'month',
            'description' => 'Perfect for growing businesses',
            'features' => [
                'Everything in Premium',
                'Multiple Team Members',
                'Advanced Security',
                'Custom Integration',
                'Dedicated Support',
                'Enterprise Features'
            ],
            'is_active' => true,
            'trial_days' => 15
        ]);
    }
} 
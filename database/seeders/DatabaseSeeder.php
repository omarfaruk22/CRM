<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ItemGroup;
use App\Models\TbItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolePermissionSeeder::class,
            TaxSeeder::class,
            CurrencySeeder::class,
            PaymentModeSeeder::class,
            ExpensesCategorySeeder::class,
            LanguageSeeder::class,
            CountrySeeder::class,
            FieldNameSeeder::class,
            FieldtypenameSeeder::class,
            TicketStatusSeeder::class,
            SettingsSeeder::class,
            TimezoneSeeder::class,
            EmailIntegrationSeeder::class,
            FieldSeeder::class,
            VisibleTabSeeder::class,
            SettingsrequiredFieldSeeder::class,
            TicketPrioritySeeder::class,
            LeadSourceSeeder::class,
            LeadStatusSeeder::class,
            CalenderDefaultView::class,
            CalenderFirstday::class,
            SettingsfontSeeder::class,
            SettingsFormatSeeder::class,
            PrioritySeeder::class,
            SaleStatusSeeder::class,
            RelationSeeder::class,
            ItemsSeeder::class,
            ItemGroupSeeder::class,
            ProjectSettingsvisiabletab::class,

        ]);
    }
}

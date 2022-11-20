<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return redirect(route('login'));
});

Route::get('/checkDueDate5', 'CronJob@duedate5');
Route::get('/checkDueDate1', 'CronJob@duedate1');

Auth::routes();

Route::get('/logout', 'HomeController@logout');
Route::post('/checkusername', 'ProfileController@checkusername');
Route::post('/checkemail', 'ProfileController@checkemail');
Route::post('/checkcat', 'InventoryController@checkcat');
Route::post('/checksuki', 'ProfileController@checksuki');
Route::post('/checkPrice', 'InventoryController@checkPrice');
Route::post('createDeliveryReportLog', 'InventoryController@createDeliveryReportLog');
Route::post('createPullOutReportLog', 'InventoryController@createPullOutReportLog');
Route::post('editAttendance', 'PayrollController@editAttendance');

/* DataTable */
Route::get('logList', 'AnalyticsController@logList')->name('logList');
Route::get('logList', 'AnalyticsController@sm_logList')->name('sm.logList');

/* Super Admin */
Route::group(['middleware' => '\App\Http\Middleware\AdminMiddleware', 'prefix' => 'dashboard'], function() {

    
    Route::get('/portal', 'HomeController@index');

    /* Store */
    Route::get('/stores', 'StoreController@index')->name('stores');
    Route::post('/stores/store', 'StoreController@addStore')->name('store.store');
    Route::get('/stores/edit/{id}', 'StoreController@editStore')->name('store.edit');
    Route::get('/store/{id}', 'StoreController@viewStore')->name('store');
    Route::post('/stores/update/{id}', 'StoreController@updateStore')->name('store.update');

    /* Users */
    Route::get('/users', 'ProfileController@index')->name('users');
    Route::post('/users/checkusername', 'ProfileController@checkusername');
    Route::get('/users/edit/{id}', 'ProfileController@edit')->name('users.edit');
    Route::post('/users/update/{id}', 'ProfileController@update')->name('users.update');

    /* Registry */
    Route::get('/registry', 'RegistryController@index')->name('registry');

    /* Analytics */
    Route::get('/reports', 'AnalyticsController@index')->name('reports');

    /* Downloadable Forms */
    Route::get('/downloadable-forms', 'DownloadableController@admin')->name('downloadable-forms');
    Route::post('/downloadable/contracts','DownloadableController@contracts')->name('admin.downloadable.contracts');
    Route::post('/downloadable/reciepts','DownloadableController@reciepts')->name('admin.downloadable.reciepts');
    Route::post('/downloadable/layaway','DownloadableController@layaway')->name('admin.downloadable.layaway');
    Route::post('/downloadable/petty_cash','DownloadableController@petty_cash')->name('admin.downloadable.petty_cash');

    /* Logs */
    Route::get('logs', 'AnalyticsController@admin_logs')->name('logs');

    /* Error */
    Route::match(['get', 'post'], '/adminPage', 'HomeController@adminPage');
});

/* Store Manager */
Route::group(['middleware' => '\App\Http\Middleware\StoreManagerMiddleware', 'prefix' => 'store-manager'], function() {

    Route::get('/portal', 'HomeController@sm');
    Route::get('/portal/filtered', 'HomeController@sm_filtered')->name('sm.dashboard.filter');
    Route::post('/bday', 'ProfileController@bday');

    /* Brand */
    Route::get('/brand-partners', 'BrandController@sm_index')->name('sm.brand');
    Route::post('/brand-partners/store', 'BrandController@sm_store')->name('brandpartner.store');
    Route::get('/brand-partners/edit/{id}', 'BrandController@sm_edit')->name('brandpartner.edit');
    Route::post('/brand-partners/update/{id}', 'BrandController@sm_update')->name('brandpartner.update');
    Route::delete('/brand-partners/delete/{id}', 'BrandController@sm_delete');
    Route::post('/brand-partners/checkbrandcode', 'BrandController@checkbrandcode');
    Route::post('/sendmessage', 'BrandController@sendMessage');

    /* Inventory */
    Route::get('/inventory', 'InventoryController@sm_index')->name('sm.inventory');
    Route::get('/inventory/search', 'InventoryController@sm_index_search')->name('sm.inventory.search');
    Route::post('/inventory/store', 'InventoryController@sm_inventory_store')->name('sm.inventory.store');
    Route::get('/inventory/edit/{id}', 'InventoryController@sm_edit')->name('inventory.edit');
    Route::post('/inventory/inventory_update/{id}', 'InventoryController@sm_inventory_update')->name('sm.inventory.update');
    Route::delete('/inventory/delete/{id}', 'InventoryController@sm_delete');
    Route::post('/inventory/hide/{id}', 'InventoryController@sm_hide');
    Route::get('/inventory/view/{id}', 'InventoryController@sm_view')->name('inventory.view');
    Route::get('/inventory/pending/{id}', 'InventoryController@sm_pending')->name('inventory.pending');
    Route::post('/inventory/update/{id}', 'InventoryController@sm_update')->name('inventory.update');
    Route::post('/inventory/qtyupdate/{id}', 'InventoryController@sm_qtyupdate');
    Route::post('/inventory/qtyupdate_delivery/{id}', 'InventoryController@sm_qtyupdate_delivery');
    Route::post('/inventory/viewqtyupdate/{id}', 'InventoryController@sm_viewqtyupdate');
    Route::post('/inventory/accepted/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_accept');
    Route::post('/inventory/rejected/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_rejected');
    Route::post('/inventory/accepted_pullout/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_accepted_pullout');
    Route::post('/inventory/rejected_pullout/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_rejected_pullout');
    Route::post('inventory/accept_all_deliveries/{id}', 'InventoryController@sm_accept_all_deliveries');
    Route::post('inventory/accept_all_pullout/{id}', 'InventoryController@sm_accept_all_pullout');
    Route::post('inventory/reject_all_deliveries/{id}', 'InventoryController@sm_reject_all_deliveries');
    Route::post('inventory/reject_all_pullout/{id}', 'InventoryController@sm_reject_all_pullout');
    Route::post('category/store', 'InventoryController@category_store')->name('addcategory.store');
    Route::get('category/{id}', 'InventoryController@category')->name('category');
    Route::delete('/category/delete/{id}', 'InventoryController@sm_category_delete');
    Route::get('/update/inventory', 'InventoryController@update_inventory_barcode');
    Route::post('inventory/refresh_table', 'InventoryController@refreshtable');
    Route::get('inventory/print/barcode/{id}', 'InventoryController@sm_print_barcode')->name('sm.print.barcode');
    Route::post('inventory/barcode_qty/{id}', 'InventoryController@sm_barcodeqty');

    /* Payout */
    Route::get('/payout', 'PayoutController@sm_payout')->name('sm.payout');
    Route::get('/payout/filtered', 'PayoutController@payout_filter')->name('payout_filter');
    Route::post('/payout/post', 'PayoutController@sm_payout_post');

    /* Staff */
    Route::get('/staff', 'ProfileController@staff')->name('sm.staff');
    Route::post('/staff/store', 'ProfileController@addStaff')->name('add.staff');
    Route::get('/staff/edit/{id}', 'ProfileController@sm_edit')->name('sm.users.edit');
    Route::post('/staff/update/{id}', 'ProfileController@sm_update')->name('sm.users.update');
    Route::delete('/user/delete/{id}', 'ProfileController@sm_delete');

    /* Rentals */
    Route::get('/rental-dues', 'RentalsController@sm_index')->name('sm.rentals');
    Route::get('/rentals/summary-reports-payments', 'RentalsController@sm_summary')->name('sm.rentals.report');
    Route::post('/rentalnotif', 'RentalsController@rentalnotif');
    Route::post('/rentalsettled', 'RentalsController@rentalsettled');
    Route::post('/rental_payment/{id}', 'RentalsController@rental_payment')->name('sm.rentals.payment');
    Route::post('/contractend', 'RentalsController@contractend');
    Route::get('/rentals/payments', 'RentalsController@sm_payments')->name('sm.rentals.payments');
    Route::get('/rentals/contract-durations', 'RentalsController@sm_durations')->name('sm.rentals.duration');
    Route::post('/contractnotif', 'RentalsController@contractnotif');
    Route::post('/rentals/extend-durations', 'RentalsController@sm_addDuration')->name('sm.rental.addDuration');
    Route::get('/rentals/summary-reports-payments/filtered', 'RentalsController@sm_summary_filtered')->name('rentals.summary.filter');
    Route::get('/rentals/brand-info/{id}', 'RentalsController@sm_brandinfo')->name('sm.rentals.brand');
    Route::post('/rentals/email_receipt/{id}', 'RentalsController@email_receipt')->name('sm.rental.email_receipt');
    Route::get('/rentals/payment/edit/{id}', 'RentalsController@sm_rentalpayment_edit')->name('sm.rentalpayment.edit');
    Route::post('rentals/payment/update/{id}', 'RentalsController@sm_rentalpayment_update')->name('sm.rentalpayment.update');
    Route::delete('rentals/payment/delete/{id}', 'RentalsController@sm_rentalpayment_delete')->name('sm.rentalpayment.delete');
    Route::post('/rentals/print_receipt/{id}', 'RentalsController@print_receipt');
    Route::post('/rentals/export', 'RentalsController@sm_export')->name('sm.rentals.export');

    /* Forms */
    Route::get('/downloadable-forms', 'DownloadableController@sm_index')->name('sm.download_forms');
    Route::get('/downloadcontract/{file}', 'DownloadableController@downloadcontract')->name('downloadcontract');
    Route::get('/downloadreciept/{file}', 'DownloadableController@downloadreciept')->name('downloadreciept');
    Route::get('/downloadlayaway/{file}', 'DownloadableController@downloadlayaway')->name('downloadlayaway');
    Route::get('/downloadpetty_cash/{file}', 'DownloadableController@downloadpetty_cash')->name('downloadpetty_cash');

    /* Customer */
    Route::get('/customers', 'ProfileController@sm_customer')->name('sm.customer');
    Route::post('/customer/store', 'ProfileController@sm_customer_store')->name('sm.add.customer');
    Route::get('/points', 'ProfileController@sm_customer_points')->name('sm.points');
    Route::post('/points/apply/{id}', 'ProfileController@sm_apply_points');
    Route::get('customer/edit/{id}', 'ProfileController@sm_customer_edit')->name('customer.edit');
    Route::post('customer/save/{id}', 'ProfileController@sm_customer_save')->name('sm.edit.customer');
    Route::post('reserve/store', 'InventoryController@reserve_store')->name('reserve.store');
    Route::get('reserve/view/{id}', 'InventoryController@reserve_view')->name('sm.transaction.edit');
    Route::delete('/transaction/delete/{id}', 'InventoryController@reserve_delete')->name('sm.transaction.delete');
    Route::post('reserve/addpay/{id}', 'InventoryController@reserve_addpay')->name('sm.transaction.addpay');
    Route::post('reserve/settle/{id}', 'InventoryController@reserve_settle')->name('sm.transaction.settled');
    Route::post('layaway/store', 'InventoryController@layaway_store')->name('layaway.store');
    Route::post('request/store', 'InventoryController@request_store')->name('request.store');
    Route::get('request/view/{id}', 'InventoryController@request_view')->name('sm.transaction_request.edit');
    Route::delete('/transaction_request/delete/{id}', 'InventoryController@request_delete')->name('sm.transaction_request.delete');
    Route::post('request/addpay/{id}', 'InventoryController@request_addpay')->name('sm.transaction.addpay_request');
    Route::post('request/settle/{id}', 'InventoryController@request_settle')->name('sm.transaction.request_settled');
    Route::get('customer/point-value', 'ProfileController@sm_point_value')->name('point_value');
    Route::post('point/store', 'ProfileController@sm_point_store')->name('points.store');

    /* Analytics */
    Route::get('/reports', 'AnalyticsController@sm_index')->name('sm.reports');
    Route::get('/reports/filtered', 'AnalyticsController@sm_index_filtered')->name('sm.reports.filter');
    Route::get('/sales-reports', 'AnalyticsController@sm_sales_report')->name('sm.reports.sales');
    Route::get('/sales-reports/{id}', 'AnalyticsController@sm_sales_brandsales')->name('sm.rentals.brandsales');
    Route::get('/sales-reports/filtered/{id}', 'AnalyticsController@sm_sales_brandsales_filtered')->name('sm.sales_filter');

    /* Error */
    Route::match(['get', 'post'], '/storemanagePage', 'HomeController@storemanagePage');

    /* Payroll */
    Route::get('/payroll/attendance', 'PayrollController@sm_attendance')->name('sm.payroll.attendance');
    Route::get('payroll/attendance/{id}', 'PayrollController@sm_attendance_edit')->name('sm.attendance.edit');
    Route::get('payroll/attendance/edit/{id}', 'PayrollController@sm_edit_attendance')->name('edit.attendance');
    Route::get('payroll/attendance/{id}/filtered', 'PayrollController@sm_attendance_filtered')->name('sm.attendance.filter');
    Route::post('editattendance/time_in', 'PayrollController@sm_update_attendance_timein');
    Route::post('editattendance/time_out', 'PayrollController@sm_update_attendance_timeout');
    Route::post('payroll/status/{id}', 'PayrollController@sm_payroll');
    Route::post('payroll_tab/status/{id}', 'PayrollController@sm_payroll_tab');
    Route::get('/payroll/salary', 'PayrollController@sm_salary')->name('sm.payroll.salary');
    Route::get('/payroll/staff', 'PayrollController@sm_staff')->name('sm.payroll.staff');
    Route::post('pyroll/staff/store', 'PayrollController@sm_addStaff')->name('add.payroll.staff');

    /* Attendance */
    Route::post('/attendance/time_in/{id}', 'PayrollController@sup_time_in');
    Route::post('/attendance/time_out/{id}', 'PayrollController@sup_time_out');

    /* Logs */
    Route::get('logs', 'AnalyticsController@sm_logs')->name('sm.logs');
    Route::get('/settings', 'HomeController@settings')->name('sm.settings');
    Route::post('settings/save/{id}', 'HomeController@save_settings')->name('sm.settings.save');
});

/* Partner */
Route::group(['middleware' => '\App\Http\Middleware\BrandPartnerMiddleware', 'prefix' => 'partner'], function() {

    Route::get('/portal', 'HomeController@partner');

    /* Dashboard */
    Route::post('notif/read/{id}', 'HomeController@partner_notif');
    
    /* Inventory */
    Route::get('/inventory', 'InventoryController@partner_index')->name('partner.inventory');
    Route::post('/inventory/store', 'InventoryController@partner_store')->name('partner.inventory.store');
    Route::post('/inventory/update/{id}/brand/{brand_id}', 'InventoryController@partner_update')->name('partner.inventory.update');
    Route::get('/inventory/delivery/{id}', 'InventoryController@partner_inventory_delivery')->name('partner.delivery');
    Route::get('/inventory/barcode/{id}', 'InventoryController@partner_inventory_barcode')->name('partner.barcode');
    Route::get('/inventory/pullout/{id}', 'InventoryController@partner_inventory_pullout')->name('partner.pullout');
    Route::post('/inventory/pullout_update/{id}/brand_id/{brand_id}', 'InventoryController@partner_pullout_update');
    Route::delete('/inventory/delete/{id}', 'InventoryController@partner_delete');
    Route::get('inventory/print/barcode/{id}', 'InventoryController@partner_print_barcode')->name('partner.print.barcode');
    Route::post('inventory/barcode_qty/{id}', 'InventoryController@partner_barcodeqty');

    /* Sales */
    Route::get('/sales', 'PayoutController@partner_payout')->name('partner.sales');
    Route::get('/sales/filtered', 'PayoutController@partner_payout_filter')->name('partner.sales_filter');

    /* Staff */
    Route::get('/profile', 'ProfileController@partner_profile')->name('partner.profile');
    Route::post('/profile/update/{id}', 'BrandController@partner_profile')->name('partner.update');

    /* Forms */
    Route::get('/downloadable-forms', 'DownloadableController@partner_index')->name('partner.download_forms');
});

/* Cashier */
Route::group(['middleware' => '\App\Http\Middleware\CashierMiddleware', 'prefix' => 'pos'], function() {
    Route::get('/portal', 'POSController@index');

    /* POS */
    Route::get('sku/search/{sku}', 'POSController@search_sku');
    Route::post('pos/store', 'POSController@store')->name('pos.store');
    Route::post('itemlist/store', 'POSController@itemlist_store');
    Route::delete('itemlist/delete/{id}', 'POSController@itemlist_delete');
    Route::get('/summary-sales', 'POSController@summary_sales')->name('pos.summary');
    Route::get('/summary-sales/filtered', 'POSController@summary_sales_filtered')->name('pos.summary.filtered');
    Route::get('/inventory', 'POSController@inventory')->name('pos.inventory');
    Route::get('/transactions', 'POSController@transactions')->name('pos.transactions');
    Route::get('/transactions/filtered', 'POSController@transactions_filtered')->name('pos.transaction.filtered');
    Route::any('/void-transaction/{transaction_id}', 'POSController@void_transaction');
    Route::get('/verifypin/{pin}', 'POSController@verifypin');
    Route::get('/transactions/print/{id}', 'POSController@transaction_print')->name('pos.transaction.print');

    /* Customer */
    Route::get('/customers', 'ProfileController@pos_customer')->name('pos.customers');
    Route::post('/customer/store', 'ProfileController@pos_customer_store')->name('pos.add.customer');
    Route::get('customer/edit/{id}', 'ProfileController@pos_customer_edit')->name('pos.customer.edit');
    Route::post('customer/update/{id}', 'ProfileController@pos_customer_update')->name('pos.edit.customer');
    Route::post('reserve/store', 'InventoryController@pos_reserve_store')->name('pos.reserve.store');
    Route::post('request/store', 'InventoryController@pos_request_store')->name('pos.request.store');
    Route::post('layaway/store', 'InventoryController@pos_layaway_store')->name('pos.layaway.store');
    Route::get('reserve/view/{id}', 'InventoryController@pos_reserve_view')->name('pos.transaction.edit');
    Route::post('reserve/addpay/{id}', 'InventoryController@pos_reserve_addpay')->name('pos.transaction.addpay');
    Route::post('reserve/settle/{id}', 'InventoryController@pos_reserve_settle')->name('pos.transaction.settled');
    Route::post('request/settle/{id}', 'InventoryController@pos_request_settle')->name('pos.transaction.request_settled');
    Route::get('request/view/{id}', 'InventoryController@pos_request_view')->name('pos.transaction_request.edit');
    Route::post('request/addpay/{id}', 'InventoryController@pos_request_addpay')->name('pos.transaction.addpay_request');
    Route::delete('/transaction/delete/{id}', 'InventoryController@pos_reserve_delete')->name('pos.transaction.delete');
    Route::delete('/transaction_request/delete/{id}', 'InventoryController@pos_request_delete')->name('pos.transaction_request.delete');
});

/* Supervisor */
Route::group(['middleware' => '\App\Http\Middleware\SupervisorMiddleware', 'prefix' => 'supervisor'], function() {
    Route::get('/portal', 'HomeController@supervisor');

    /* Inventory */
    Route::get('/inventory/view/{id}', 'InventoryController@sup_view')->name('sup.inventory.view');
    Route::get('/inventory/pending/{id}', 'InventoryController@sup_pending')->name('sup.inventory.pending');
    Route::post('/inventory/qtyupdate/{id}', 'InventoryController@sm_qtyupdate');
    Route::post('/inventory/qtyupdate_delivery/{id}', 'InventoryController@sm_qtyupdate_delivery');
    Route::post('/inventory/update/{id}', 'InventoryController@sm_update')->name('inventory.update');
    Route::post('/inventory/accepted/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_accept');
    Route::post('/inventory/rejected/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_rejected');
    Route::post('/inventory/accepted_pullout/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_accepted_pullout');
    Route::post('/inventory/rejected_pullout/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_rejected_pullout');
    Route::post('inventory/accept_all_deliveries/{id}', 'InventoryController@sm_accept_all_deliveries');
    Route::post('inventory/accept_all_pullout/{id}', 'InventoryController@sm_accept_all_pullout');
    Route::post('inventory/reject_all_deliveries/{id}', 'InventoryController@sm_reject_all_deliveries');
    Route::post('inventory/reject_all_pullout/{id}', 'InventoryController@sm_reject_all_pullout');
    Route::post('inventory/refresh_table', 'InventoryController@sup_refreshtable');

    /* Customer */
    Route::get('/customers', 'ProfileController@sup_customer')->name('sup.customer');
    Route::get('/points', 'ProfileController@sup_customer_points')->name('sup.points');
    Route::post('/customer/store', 'ProfileController@sup_customer_store')->name('sup.add.customer');
    Route::get('customer/edit/{id}', 'ProfileController@sup_customer_edit')->name('sup.customer.edit');
    Route::post('customer/save/{id}', 'ProfileController@sup_customer_save')->name('sup.edit.customer');
    Route::post('reserve/store', 'InventoryController@sup_reserve_store')->name('sup.reserve.store');
    Route::post('request/store', 'InventoryController@sup_request_store')->name('sup.request.store');
    Route::post('layaway/store', 'InventoryController@sup_layaway_store')->name('sup.layaway.store');
    Route::get('reserve/view/{id}', 'InventoryController@sup_reserve_view')->name('sup.transaction.edit');
    Route::post('reserve/addpay/{id}', 'InventoryController@sup_reserve_addpay')->name('sup.transaction.addpay');
    Route::post('reserve/settle/{id}', 'InventoryController@sup_reserve_settle')->name('sup.transaction.settled');
    Route::post('request/settle/{id}', 'InventoryController@sup_request_settle')->name('sup.transaction.request_settled');
    Route::get('request/view/{id}', 'InventoryController@sup_request_view')->name('sup.transaction_request.edit');
    Route::post('request/addpay/{id}', 'InventoryController@sup_request_addpay')->name('sup.transaction.addpay_request');
    Route::delete('/transaction/delete/{id}', 'InventoryController@sup_reserve_delete')->name('sup.transaction.delete');
    Route::delete('/transaction_request/delete/{id}', 'InventoryController@sup_request_delete')->name('sup.transaction_request.delete');

    /* Attendance */
    Route::get('/attendance', 'PayrollController@sup_attendance');
    Route::post('/attendance/time_in/{id}', 'PayrollController@sup_time_in');
    Route::post('/attendance/time_out/{id}', 'PayrollController@sup_time_out');
});

/* Manager */
Route::group(['middleware' => '\App\Http\Middleware\ManagerMiddleware', 'prefix' => 'manager'], function() {
    Route::get('/portal', 'HomeController@manager');
    
    /* Brand */
    Route::get('/brand-partners', 'BrandController@manager_index')->name('manager.brand');
    Route::post('/brand-partners/store', 'BrandController@manager_store')->name('manager.brandpartner.store');
    Route::get('/brand-partners/edit/{id}', 'BrandController@manager_edit')->name('manager.brandpartner.edit');
    Route::post('/brand-partners/update/{id}', 'BrandController@manager_update')->name('manager.brandpartner.update');
    Route::delete('/brand-partners/delete/{id}', 'BrandController@manager_delete');
    Route::post('/brand-partners/checkbrandcode', 'BrandController@checkbrandcode');
    Route::post('/sendmessage', 'BrandController@sendMessage');

    /* Inventory */
    Route::get('/inventory/view/{id}', 'InventoryController@manager_view')->name('manager.inventory.view');
    Route::get('/inventory/pending/{id}', 'InventoryController@manager_pending')->name('manager.inventory.pending');
    Route::post('/inventory/qtyupdate/{id}', 'InventoryController@sm_qtyupdate');
    Route::post('/inventory/qtyupdate_delivery/{id}', 'InventoryController@sm_qtyupdate_delivery');
    Route::post('/inventory/update/{id}', 'InventoryController@sm_update')->name('inventory.update');
    Route::post('/inventory/accepted/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_accept');
    Route::post('/inventory/rejected/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_rejected');
    Route::post('/inventory/accepted_pullout/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_accepted_pullout');
    Route::post('/inventory/rejected_pullout/{id}/brand_id/{brand_id}', 'InventoryController@sm_inventory_rejected_pullout');
    Route::post('inventory/accept_all_deliveries/{id}', 'InventoryController@sm_accept_all_deliveries');
    Route::post('inventory/accept_all_pullout/{id}', 'InventoryController@sm_accept_all_pullout');
    Route::post('inventory/reject_all_deliveries/{id}', 'InventoryController@sm_reject_all_deliveries');
    Route::post('inventory/reject_all_pullout/{id}', 'InventoryController@sm_reject_all_pullout');
    Route::post('inventory/refresh_table', 'InventoryController@manager_refreshtable');

    /* Customer */
    Route::get('/customers', 'ProfileController@manager_customer')->name('manager.customer');
    Route::get('/points', 'ProfileController@manager_customer_points')->name('manager.points');
    Route::post('/customer/store', 'ProfileController@manager_customer_store')->name('manager.add.customer');
    Route::get('customer/edit/{id}', 'ProfileController@manager_customer_edit')->name('manager.customer.edit');
    Route::post('customer/save/{id}', 'ProfileController@manager_customer_save')->name('manager.edit.customer');
    Route::post('reserve/store', 'InventoryController@manager_reserve_store')->name('manager.reserve.store');
    Route::post('request/store', 'InventoryController@manager_request_store')->name('manager.request.store');
    Route::post('layaway/store', 'InventoryController@manager_layaway_store')->name('manager.layaway.store');
    Route::get('reserve/view/{id}', 'InventoryController@manager_reserve_view')->name('manager.transaction.edit');
    Route::post('reserve/addpay/{id}', 'InventoryController@manager_reserve_addpay')->name('manager.transaction.addpay');
    Route::post('reserve/settle/{id}', 'InventoryController@manager_reserve_settle')->name('manager.transaction.settled');
    Route::post('request/settle/{id}', 'InventoryController@manager_request_settle')->name('manager.transaction.request_settled');
    Route::get('request/view/{id}', 'InventoryController@manager_request_view')->name('manager.transaction_request.edit');
    Route::post('request/addpay/{id}', 'InventoryController@manager_request_addpay')->name('manager.transaction.addpay_request');
    Route::delete('/transaction/delete/{id}', 'InventoryController@manager_reserve_delete')->name('manager.transaction.delete');
    Route::delete('/transaction_request/delete/{id}', 'InventoryController@manager_request_delete')->name('manager.transaction_request.delete');

    /* Attendance */
    Route::get('/attendance', 'PayrollController@manager_attendance');
    Route::post('/attendance/time_in/{id}', 'PayrollController@manager_time_in');
    Route::post('/attendance/time_out/{id}', 'PayrollController@manager_time_out');
});
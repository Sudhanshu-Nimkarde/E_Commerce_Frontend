<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

class VendorDashboardController extends Controller
{
    protected function vendorViewData(string $activePage, array $extra = []): array
    {
        $vendorName = session('user_name', 'North Star Vendor');

        return array_merge([
            'vendorName' => $vendorName,
            'vendorInitial' => strtoupper(substr($vendorName, 0, 1)),
            'vendorRoleId' => (int) session('role_id', 2),
            'vendorRoleName' => session('role_name', 'Vendor'),
            'vendorStoreName' => 'North Star Market',
            'vendorActivePage' => $activePage,
        ], $extra);
    }

    protected function renderVendorPage(string $view, string $activePage, array $extra = [])
    {
        return view($view, $this->vendorViewData($activePage, $extra));
    }

    protected function dashboardData(): array
    {
        return [
            'dashboardStats' => [
                ['label' => 'Sales this month', 'value' => '$128,430', 'meta' => '+12.8% from last month', 'icon' => 'bi-currency-dollar'],
                ['label' => 'Orders in queue', 'value' => '184', 'meta' => '72 require packing today', 'icon' => 'bi-receipt'],
                ['label' => 'Active products', 'value' => '1,248', 'meta' => '38 drafts awaiting review', 'icon' => 'bi-box-seam'],
                ['label' => 'Low stock SKUs', 'value' => '19', 'meta' => 'Reorder before weekend', 'icon' => 'bi-exclamation-triangle'],
                ['label' => 'Refund reserve', 'value' => '$4,320', 'meta' => '7 open refund cases', 'icon' => 'bi-arrow-counterclockwise'],
                ['label' => 'Customer rating', 'value' => '4.8/5', 'meta' => '12,430 verified reviews', 'icon' => 'bi-star-fill'],
            ],
            'dashboardCharts' => [
                [
                    'title' => 'Revenue trend',
                    'subtitle' => 'Last 30 days',
                    'bars' => [42, 56, 61, 49, 74, 68, 81, 77, 88, 73, 92, 86],
                    'legend' => 'Monthly revenue and orders moved in a steady range with a healthy close.',
                ],
                [
                    'title' => 'Sales mix',
                    'subtitle' => 'Product vs bundle share',
                    'bars' => [34, 46, 52, 58, 67, 74, 81, 69, 62, 76, 85, 79],
                    'legend' => 'Bundles and premium accessories are leading conversion this week.',
                ],
                [
                    'title' => 'Customer growth',
                    'subtitle' => 'New vs returning buyers',
                    'bars' => [29, 37, 43, 51, 58, 64, 72, 68, 75, 80, 84, 90],
                    'legend' => 'Returning customers are increasing alongside repeat order frequency.',
                ],
            ],
            'recentOrders' => [
                ['id' => '#ORD-4281', 'customer' => 'Mia Thompson', 'items' => '4 items', 'amount' => '$248.90', 'status' => 'Ready to ship'],
                ['id' => '#ORD-4280', 'customer' => 'Arjun Patel', 'items' => '2 items', 'amount' => '$139.00', 'status' => 'Processing'],
                ['id' => '#ORD-4279', 'customer' => 'Sara Gomez', 'items' => '1 item', 'amount' => '$79.50', 'status' => 'Packed'],
                ['id' => '#ORD-4278', 'customer' => 'Noah Wilson', 'items' => '3 items', 'amount' => '$315.20', 'status' => 'Shipped'],
                ['id' => '#ORD-4277', 'customer' => 'Eva Chen', 'items' => '2 items', 'amount' => '$184.10', 'status' => 'Delivered'],
            ],
            'riskAlerts' => [
                ['title' => 'Low stock on 7 SKUs', 'meta' => 'Reorder requests are recommended before the weekend spike.'],
                ['title' => 'Two shipping delays', 'meta' => 'Carrier SLA needs review for metro deliveries.'],
                ['title' => 'One refund escalated', 'meta' => 'Payment reversal should be monitored by finance.'],
            ],
            'activityTimeline' => [
                ['time' => '09:40', 'title' => 'Order packed', 'meta' => '#ORD-4281 updated by warehouse team.'],
                ['time' => '08:55', 'title' => 'Product approved', 'meta' => 'Premium headphones listing passed review.'],
                ['time' => '08:10', 'title' => 'Refund initiated', 'meta' => 'Partial refund requested for damaged item.'],
                ['time' => 'Yesterday', 'title' => 'Promo launched', 'meta' => 'Weekend coupon became active at 6:00 PM.'],
            ],
        ];
    }

    protected function shopData(): array
    {
        return [
            'shopStats' => [
                ['label' => 'Verification', 'value' => 'Approved', 'meta' => 'KYC documents are on file'],
                ['label' => 'Store rating', 'value' => '4.8/5', 'meta' => 'Based on 12k customer reviews'],
                ['label' => 'Response time', 'value' => '1h 12m', 'meta' => 'Average customer reply time'],
                ['label' => 'Policy status', 'value' => 'Up to date', 'meta' => 'Shipping and return rules synced'],
            ],
            'profileRows' => [
                ['label' => 'Store name', 'value' => 'North Star Market'],
                ['label' => 'Business category', 'value' => 'Electronics and accessories'],
                ['label' => 'Support email', 'value' => 'support@northstarmarket.com'],
                ['label' => 'Time zone', 'value' => 'Asia/Kolkata'],
                ['label' => 'Operating hours', 'value' => 'Mon-Sat, 9:00 AM - 8:00 PM'],
            ],
            'complianceRows' => [
                ['label' => 'GST verification', 'status' => 'Verified'],
                ['label' => 'Bank account', 'status' => 'Linked'],
                ['label' => 'Return policy', 'status' => 'Published'],
                ['label' => 'Shipping policy', 'status' => 'Published'],
            ],
            'shippingZones' => [
                ['zone' => 'Domestic standard', 'eta' => '3-5 days', 'status' => 'Active'],
                ['zone' => 'Metro express', 'eta' => '1-2 days', 'status' => 'Active'],
                ['zone' => 'International', 'eta' => '7-12 days', 'status' => 'Paused'],
            ],
            'teamRows' => [
                ['name' => 'Aman Mehta', 'role' => 'Store owner', 'access' => 'Full access', 'status' => 'Active'],
                ['name' => 'Pooja Singh', 'role' => 'Catalog manager', 'access' => 'Products and inventory', 'status' => 'Active'],
                ['name' => 'Rohit Das', 'role' => 'Support agent', 'access' => 'Customer messages', 'status' => 'Limited'],
            ],
        ];
    }

    protected function productData(): array
    {
        return [
            'productStats' => [
                ['label' => 'Published products', 'value' => '1,248', 'meta' => '1,090 live and 158 drafts'],
                ['label' => 'Category depth', 'value' => '3 levels', 'meta' => 'Structured catalog hierarchy'],
                ['label' => 'Out of stock', 'value' => '12', 'meta' => 'Needs replenishment'],
                ['label' => 'Brand coverage', 'value' => '42', 'meta' => 'Verified and pending brands'],
            ],
            'productRows' => [
                ['sku' => 'NS-10024', 'name' => 'Wireless Noise Cancelling Headphones', 'category' => 'Audio', 'brand' => 'Sonara', 'price' => '$129.00', 'stock' => '68', 'status' => 'Published'],
                ['sku' => 'NS-10025', 'name' => 'Smart Watch Pro 5', 'category' => 'Wearables', 'brand' => 'PulseOne', 'price' => '$179.00', 'stock' => '24', 'status' => 'Published'],
                ['sku' => 'NS-10026', 'name' => 'Portable Bluetooth Speaker', 'category' => 'Audio', 'brand' => 'BeatLoop', 'price' => '$89.00', 'stock' => '11', 'status' => 'Low stock'],
                ['sku' => 'NS-10027', 'name' => 'Ergo Desk Lamp', 'category' => 'Home Office', 'brand' => 'Glowline', 'price' => '$49.00', 'stock' => '0', 'status' => 'Draft'],
                ['sku' => 'NS-10028', 'name' => 'USB-C Fast Charger', 'category' => 'Accessories', 'brand' => 'Voltix', 'price' => '$29.00', 'stock' => '124', 'status' => 'Published'],
            ],
            'categoryTree' => [
                ['depth' => 0, 'title' => 'Electronics', 'meta' => '124 active products'],
                ['depth' => 1, 'title' => 'Audio', 'meta' => '39 active products'],
                ['depth' => 2, 'title' => 'Wireless Headphones', 'meta' => '12 items'],
                ['depth' => 1, 'title' => 'Wearables', 'meta' => '28 active products'],
                ['depth' => 2, 'title' => 'Smart Watches', 'meta' => '9 items'],
                ['depth' => 0, 'title' => 'Home Office', 'meta' => '88 active products'],
                ['depth' => 1, 'title' => 'Lighting', 'meta' => '21 active products'],
                ['depth' => 2, 'title' => 'Desk Lamps', 'meta' => '7 items'],
            ],
            'brandRows' => [
                ['name' => 'Sonara', 'badge' => 'Verified'],
                ['name' => 'PulseOne', 'badge' => 'Verified'],
                ['name' => 'BeatLoop', 'badge' => 'Pending review'],
                ['name' => 'Glowline', 'badge' => 'Verified'],
                ['name' => 'Voltix', 'badge' => 'Verified'],
            ],
        ];
    }

    protected function inventoryData(): array
    {
        return [
            'inventoryStats' => [
                ['label' => 'Units in stock', 'value' => '18,420', 'meta' => 'Across 2 warehouses'],
                ['label' => 'Low stock SKUs', 'value' => '19', 'meta' => 'Needs reorder'],
                ['label' => 'Out of stock', 'value' => '12', 'meta' => 'Temporarily unavailable'],
                ['label' => 'Incoming shipments', 'value' => '8', 'meta' => 'ETA within 7 days'],
            ],
            'inventoryRows' => [
                ['sku' => 'NS-10024', 'product' => 'Wireless Noise Cancelling Headphones', 'warehouse' => 'Mumbai Hub', 'onHand' => '68', 'reserved' => '14', 'reorder' => '20', 'status' => 'Healthy'],
                ['sku' => 'NS-10025', 'product' => 'Smart Watch Pro 5', 'warehouse' => 'Mumbai Hub', 'onHand' => '24', 'reserved' => '8', 'reorder' => '30', 'status' => 'Low stock'],
                ['sku' => 'NS-10026', 'product' => 'Portable Bluetooth Speaker', 'warehouse' => 'Delhi Hub', 'onHand' => '11', 'reserved' => '5', 'reorder' => '25', 'status' => 'Low stock'],
                ['sku' => 'NS-10027', 'product' => 'Ergo Desk Lamp', 'warehouse' => 'Delhi Hub', 'onHand' => '0', 'reserved' => '0', 'reorder' => '18', 'status' => 'Out of stock'],
                ['sku' => 'NS-10028', 'product' => 'USB-C Fast Charger', 'warehouse' => 'Mumbai Hub', 'onHand' => '124', 'reserved' => '16', 'reorder' => '40', 'status' => 'Healthy'],
            ],
            'warehouseRows' => [
                ['name' => 'Mumbai Hub', 'fill' => '82%', 'inbound' => '3 shipments', 'sla' => '98.6%'],
                ['name' => 'Delhi Hub', 'fill' => '74%', 'inbound' => '2 shipments', 'sla' => '97.9%'],
            ],
            'restockAlerts' => [
                ['title' => 'Smart Watch Pro 5', 'meta' => 'Reserve stock reaches threshold in 4 days.', 'action' => 'Create replenishment'],
                ['title' => 'Portable Bluetooth Speaker', 'meta' => 'Inventory is below safety buffer.', 'action' => 'Notify supplier'],
                ['title' => 'Ergo Desk Lamp', 'meta' => 'Out of stock for 2 days and counting.', 'action' => 'Mark unavailable'],
            ],
        ];
    }

    protected function orderData(): array
    {
        return [
            'orderStats' => [
                ['label' => 'New orders', 'value' => '184', 'meta' => '72 need same-day action'],
                ['label' => 'Processing', 'value' => '39', 'meta' => 'Awaiting packing'],
                ['label' => 'Shipped', 'value' => '96', 'meta' => 'Carrier handoff complete'],
                ['label' => 'Cancellations', 'value' => '8', 'meta' => 'Needs review'],
            ],
            'orderRows' => [
                ['id' => '#ORD-4281', 'customer' => 'Mia Thompson', 'items' => '4 items', 'amount' => '$248.90', 'payment' => 'Paid', 'status' => 'Ready to ship'],
                ['id' => '#ORD-4280', 'customer' => 'Arjun Patel', 'items' => '2 items', 'amount' => '$139.00', 'payment' => 'Paid', 'status' => 'Processing'],
                ['id' => '#ORD-4279', 'customer' => 'Sara Gomez', 'items' => '1 item', 'amount' => '$79.50', 'payment' => 'COD', 'status' => 'Packed'],
                ['id' => '#ORD-4278', 'customer' => 'Noah Wilson', 'items' => '3 items', 'amount' => '$315.20', 'payment' => 'Paid', 'status' => 'Shipped'],
                ['id' => '#ORD-4277', 'customer' => 'Eva Chen', 'items' => '2 items', 'amount' => '$184.10', 'payment' => 'Paid', 'status' => 'Delivered'],
            ],
            'timelineSteps' => [
                ['title' => 'Order received', 'meta' => 'Confirmed by payment gateway'],
                ['title' => 'Picking complete', 'meta' => 'Warehouse selection is finished'],
                ['title' => 'Packed', 'meta' => 'Parcel weighed and labeled'],
                ['title' => 'Out for delivery', 'meta' => 'Carrier assignment is complete'],
                ['title' => 'Delivered', 'meta' => 'Proof of delivery recorded'],
            ],
        ];
    }

    protected function discountData(): array
    {
        return [
            'discountStats' => [
                ['label' => 'Active coupons', 'value' => '14', 'meta' => '6 expire this month'],
                ['label' => 'Scheduled campaigns', 'value' => '5', 'meta' => 'Ready to launch'],
                ['label' => 'Ad spend', 'value' => '$3,420', 'meta' => 'Current month budget'],
                ['label' => 'Conversion uplift', 'value' => '+18%', 'meta' => 'Promo performance trend'],
            ],
            'campaignRows' => [
                ['name' => 'Weekend flash sale', 'type' => 'Flat 12% off', 'channel' => 'Store banner', 'status' => 'Active'],
                ['name' => 'Cart recovery coupon', 'type' => '$10 off', 'channel' => 'Email', 'status' => 'Scheduled'],
                ['name' => 'Bundle booster', 'type' => 'Buy 2 get 1', 'channel' => 'Homepage', 'status' => 'Active'],
                ['name' => 'Festival promo', 'type' => 'Flat 15% off', 'channel' => 'Social ads', 'status' => 'Draft'],
            ],
            'couponRows' => [
                ['code' => 'SAVE12', 'usage' => '128 uses', 'expiry' => '31 Jul 2026', 'status' => 'Active'],
                ['code' => 'WELCOME10', 'usage' => '241 uses', 'expiry' => 'Always on', 'status' => 'Active'],
                ['code' => 'BUNDLE5', 'usage' => '42 uses', 'expiry' => '15 Jun 2026', 'status' => 'Paused'],
            ],
            'channelRows' => [
                ['name' => 'Email', 'metric' => '24.8% open rate', 'trend' => '+4.2%'],
                ['name' => 'Store banner', 'metric' => '11.6% CTR', 'trend' => '+1.8%'],
                ['name' => 'Social ads', 'metric' => '3.2x ROAS', 'trend' => '+0.7x'],
            ],
        ];
    }

    protected function earningsData(): array
    {
        return [
            'earningsStats' => [
                ['label' => 'Gross sales', 'value' => '$128,430', 'meta' => '30-day total'],
                ['label' => 'Commission', 'value' => '$11,520', 'meta' => 'Platform fee deduction'],
                ['label' => 'Net earnings', 'value' => '$116,910', 'meta' => 'Before tax adjustments'],
                ['label' => 'Payout due', 'value' => '$42,300', 'meta' => 'Next payout window'],
            ],
            'payoutRows' => [
                ['date' => '09 Jun 2026', 'reference' => 'PAYOUT-2241', 'amount' => '$18,240', 'status' => 'Processing'],
                ['date' => '02 Jun 2026', 'reference' => 'PAYOUT-2230', 'amount' => '$15,760', 'status' => 'Completed'],
                ['date' => '26 May 2026', 'reference' => 'PAYOUT-2218', 'amount' => '$12,300', 'status' => 'Completed'],
            ],
            'commissionRows' => [
                ['segment' => 'Electronics', 'rate' => '8%', 'note' => 'Standard category rate'],
                ['segment' => 'Accessories', 'rate' => '6%', 'note' => 'Reduced fee for add-ons'],
                ['segment' => 'Premium bundles', 'rate' => '10%', 'note' => 'Promotional category'],
            ],
            'earningNotes' => [
                'Daily settlement runs are aligned with marketplace cut-off times.',
                'Refund reserves are deducted before the payout is released.',
                'Commission history is visible here for easy future API binding.',
            ],
        ];
    }

    protected function interactionData(): array
    {
        return [
            'interactionStats' => [
                ['label' => 'Open conversations', 'value' => '18', 'meta' => '6 need reply today'],
                ['label' => 'Average response', 'value' => '1h 12m', 'meta' => 'Target under 2 hours'],
                ['label' => 'Reviews pending', 'value' => '24', 'meta' => 'Awaiting moderation'],
                ['label' => 'Return requests', 'value' => '7', 'meta' => 'Requires follow-up'],
            ],
            'conversationRows' => [
                ['customer' => 'Mia Thompson', 'subject' => 'Delivery update request', 'preview' => 'Can the order be expedited?', 'time' => '09:18', 'status' => 'Open'],
                ['customer' => 'Arjun Patel', 'subject' => 'Product compatibility', 'preview' => 'Will this charger work with my model?', 'time' => '08:44', 'status' => 'Replied'],
                ['customer' => 'Sara Gomez', 'subject' => 'Return approval', 'preview' => 'Item arrived with a minor scratch.', 'time' => 'Yesterday', 'status' => 'Escalated'],
                ['customer' => 'Noah Wilson', 'subject' => 'Bulk order enquiry', 'preview' => 'Need pricing for 20 units.', 'time' => 'Yesterday', 'status' => 'Open'],
            ],
            'messageThread' => [
                ['author' => 'Customer', 'message' => 'Can you confirm the delivery timeline?', 'time' => '09:18 AM'],
                ['author' => 'Support', 'message' => 'Your order is scheduled for dispatch today.', 'time' => '09:26 AM'],
                ['author' => 'Customer', 'message' => 'Perfect, thanks for the quick update.', 'time' => '09:30 AM'],
            ],
            'reviewRows' => [
                ['name' => 'Mia Thompson', 'rating' => '5.0', 'note' => 'Excellent packaging and fast shipping.'],
                ['name' => 'Arjun Patel', 'rating' => '4.0', 'note' => 'Good product, response time could be faster.'],
                ['name' => 'Sara Gomez', 'rating' => '4.5', 'note' => 'Helpful support during the return request.'],
            ],
            'templateRows' => [
                ['title' => 'Shipping update', 'copy' => 'Your order is packed and queued for carrier pickup.'],
                ['title' => 'Return acknowledgment', 'copy' => 'We have received your return request and are reviewing it.'],
                ['title' => 'Product guidance', 'copy' => 'Please share your device model and we will confirm compatibility.'],
            ],
        ];
    }

    public function dashboard()
    {
        return $this->renderVendorPage('vendor.dashboard', 'dashboard', $this->dashboardData());
    }

    public function shopManagement()
    {
        return $this->renderVendorPage('vendor.shop-management', 'shop-management', $this->shopData());
    }

    public function productManagement()
    {
        return $this->renderVendorPage('vendor.product-management', 'product-management', $this->productData());
    }

    public function inventory()
    {
        return $this->renderVendorPage('vendor.inventory', 'inventory', $this->inventoryData());
    }

    public function orderHandling()
    {
        return $this->renderVendorPage('vendor.order-handling', 'order-handling', $this->orderData());
    }

    public function discountsMarketing()
    {
        return $this->renderVendorPage('vendor.discounts-marketing', 'discounts-marketing', $this->discountData());
    }

    public function earnings()
    {
        return $this->renderVendorPage('vendor.earnings', 'earnings', $this->earningsData());
    }

    public function customerInteraction()
    {
        return $this->renderVendorPage('vendor.customer-interaction', 'customer-interaction', $this->interactionData());
    }
}

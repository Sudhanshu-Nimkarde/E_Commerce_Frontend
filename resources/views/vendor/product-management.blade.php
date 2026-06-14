@extends('layouts.vendor.app')

@section('title', 'Product Management - ShopEase Vendor')

@section('vendor_content')
@php
    $productStatusTone = [
        'Published' => 'is-success',
        'Low stock' => 'is-warning',
        'Draft' => 'is-muted',
    ];
@endphp

<div class="vendor-page-header">
    <div>
        <span class="vendor-kicker">Product Management</span>
        <h1 class="vendor-page-title">Catalog, brands, and listing control</h1>
        <p class="vendor-page-desc">
            A stable product management layout with clean tables, reusable cards, and light filtering for future API integration.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Bulk actions</button>
        <button type="button" class="btn btn-primary">Add product</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($productStats as $stat)
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="vendor-stat-card h-100">
                <div class="vendor-stat-card__label">{{ $stat['label'] }}</div>
                <div class="vendor-stat-card__value">{{ $stat['value'] }}</div>
                <div class="vendor-stat-card__meta">{{ $stat['meta'] }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-3 mb-4">
    <div class="col-12 col-xl-8">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header d-flex flex-wrap justify-content-between align-items-start gap-2">
                <div>
                    <h2 class="vendor-table-card__title">Product list</h2>
                    <p class="vendor-table-card__sub">Responsive, searchable table UI for future product APIs.</p>
                </div>
                <label class="vendor-search w-100" style="max-width: 360px;">
                    <i class="bi bi-search"></i>
                    <input
                        type="search"
                        placeholder="Search SKU, product, brand..."
                        aria-label="Search products"
                        data-vendor-filter-input="#productRows"
                    >
                    <button type="button">Filter</button>
                </label>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="productRows">
                        @foreach ($productRows as $product)
                            <tr data-vendor-filter-row data-filter-text="{{ implode(' ', $product) }}">
                                <td class="fw-semibold">{{ $product['sku'] }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['category'] }}</td>
                                <td>{{ $product['brand'] }}</td>
                                <td class="fw-semibold">{{ $product['price'] }}</td>
                                <td>{{ $product['stock'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $productStatusTone[$product['status']] ?? 'is-muted' }}">
                                        {{ $product['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="vendor-stack h-100">
            <div class="vendor-form-card">
                <div class="vendor-form-card__header">
                    <h3>3-level category tree</h3>
                    <p>Clear hierarchy for category planning and future ordering rules.</p>
                </div>

                <div class="vendor-tree">
                    @foreach ($categoryTree as $node)
                        <div class="vendor-tree__item" style="margin-left: {{ $node['depth'] * 1.25 }}rem;">
                            <strong>{{ $node['title'] }}</strong>
                            <span>{{ $node['meta'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="vendor-form-card flex-grow-1">
                <div class="vendor-form-card__header">
                    <h3>Brand verification</h3>
                    <p>Brand badges and review states in a compact side panel.</p>
                </div>

                <div class="vendor-mini-list">
                    @foreach ($brandRows as $brand)
                        <div class="vendor-mini-list__item">
                            <div>
                                <strong>{{ $brand['name'] }}</strong>
                                <span>Brand records and catalog mapping</span>
                            </div>
                            <span class="vendor-status-badge {{ $brand['badge'] === 'Verified' ? 'is-success' : 'is-warning' }}">
                                {{ $brand['badge'] }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="vendor-divider my-4"></div>

                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-outline-secondary">Create brand</button>
                    <button type="button" class="btn btn-outline-secondary">Merge duplicates</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-7">
        <div class="vendor-table-card">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Listing quality checklist</h2>
                <p class="vendor-table-card__sub">A simple UI for keeping product pages consistent.</p>
            </div>

            <div class="vendor-panel__body">
                <div class="vendor-checklist">
                    <div class="vendor-checklist__item"><strong>Primary image uploaded</strong><span>Complete for published products</span></div>
                    <div class="vendor-checklist__item"><strong>Title length reviewed</strong><span>Within catalog guidelines</span></div>
                    <div class="vendor-checklist__item"><strong>Pricing and tax verified</strong><span>Ready for marketplace sync</span></div>
                    <div class="vendor-checklist__item"><strong>SEO metadata added</strong><span>Description, tags, and highlights</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Draft product editor</h3>
                <p>Static form fields prepared for future API wiring.</p>
            </div>

            <div class="d-grid gap-3">
                <div>
                    <label class="form-label text-muted small mb-1">Product name</label>
                    <input type="text" class="form-control vendor-input" value="Wireless Noise Cancelling Headphones">
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">Price</label>
                    <input type="text" class="form-control vendor-input" value="$129.00">
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">Listing notes</label>
                    <textarea class="form-control vendor-input" rows="4">Premium audio product with clean metadata, fast shipping, and a verified brand badge.</textarea>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary">Save draft</button>
                    <button type="button" class="btn btn-outline-secondary">Publish</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

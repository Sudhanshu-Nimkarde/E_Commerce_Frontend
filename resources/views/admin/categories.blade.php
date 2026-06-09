@extends('layouts.admin.app')

@section('title', 'Categories - ShopEase')

@section('main_content')
@php
    $audit = [
        ['time' => '09:10', 'action' => 'Category created', 'meta' => 'Home Appliances added under Home & Kitchen.'],
        ['time' => '08:44', 'action' => 'Category reordered', 'meta' => 'Electronics moved above Fashion.'],
        ['time' => '07:55', 'action' => 'Category deactivated', 'meta' => 'Seasonal offers hidden temporarily.'],
    ];
@endphp

<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Product catalog</span>
        <h1 class="admin-page-title">Categories</h1>
        <p class="admin-page-desc">A 3-level tree, create/edit modal, and audit log in a stable layout.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary">Reorder preview</button>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">Create category</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Categories</div><div class="admin-stat__value">68</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Active</div><div class="admin-stat__value">61</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Inactive</div><div class="admin-stat__value">7</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Reorder tasks</div><div class="admin-stat__value">5</div></div></div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-7">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Tree</div>
                    <h2 class="h5 fw-bold mb-0">Category structure</h2>
                </div>
                <span class="admin-badge-soft">Active / inactive badges</span>
            </div>

            <ul class="admin-tree">
                <li>
                    <div class="admin-tree__node">
                        <div>
                            <strong>Electronics</strong>
                            <div class="text-muted small">Level 1</div>
                        </div>
                        <div class="d-flex flex-wrap gap-2 align-items-center">
                            <span class="badge rounded-pill bg-success-subtle text-success">Active</span>
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#categoryModal">Edit</button>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="admin-tree__node">
                                <div>
                                    <strong>Mobile Phones</strong>
                                    <div class="text-muted small">Level 2</div>
                                </div>
                                <span class="badge rounded-pill bg-success-subtle text-success">Active</span>
                            </div>
                            <ul>
                                <li>
                                    <div class="admin-tree__node">
                                        <div>
                                            <strong>Android</strong>
                                            <div class="text-muted small">Level 3</div>
                                        </div>
                                        <span class="badge rounded-pill bg-success-subtle text-success">Active</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="admin-tree__node">
                                        <div>
                                            <strong>iPhone</strong>
                                            <div class="text-muted small">Level 3</div>
                                        </div>
                                        <span class="badge rounded-pill bg-secondary-subtle text-secondary">Inactive</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="admin-tree__node">
                                <div>
                                    <strong>Laptops</strong>
                                    <div class="text-muted small">Level 2</div>
                                </div>
                                <span class="badge rounded-pill bg-success-subtle text-success">Active</span>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="admin-tree__node">
                        <div>
                            <strong>Home & Kitchen</strong>
                            <div class="text-muted small">Level 1</div>
                        </div>
                        <span class="badge rounded-pill bg-success-subtle text-success">Active</span>
                    </div>
                    <ul>
                        <li><div class="admin-tree__node"><div><strong>Appliances</strong><div class="text-muted small">Level 2</div></div><span class="badge rounded-pill bg-success-subtle text-success">Active</span></div></li>
                        <li><div class="admin-tree__node"><div><strong>Kitchen</strong><div class="text-muted small">Level 2</div></div><span class="badge rounded-pill bg-secondary-subtle text-secondary">Inactive</span></div></li>
                    </ul>
                </li>
                <li>
                    <div class="admin-tree__node">
                        <div>
                            <strong>Fashion</strong>
                            <div class="text-muted small">Level 1</div>
                        </div>
                        <span class="badge rounded-pill bg-success-subtle text-success">Active</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-xl-5">
        <div class="admin-panel admin-panel__body mb-4">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Reorder</div>
                    <h2 class="h5 fw-bold mb-0">Placeholder</h2>
                </div>
            </div>

            <div class="admin-soft">
                <div class="d-flex justify-content-between gap-2 mb-2">
                    <strong>Drag handle</strong>
                    <i class="bi bi-grip-vertical text-muted"></i>
                </div>
                <div class="text-muted small">This area stays simple so future drag and drop logic can be added without layout changes.</div>
            </div>
        </div>

        <div class="admin-panel admin-panel__body">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">List</div>
                    <h2 class="h5 fw-bold mb-0">Category list</h2>
                </div>
            </div>

            <div class="admin-list">
                <div class="admin-list__item"><div><strong>Electronics</strong><div class="text-muted small">24 subcategories</div></div><span class="badge rounded-pill bg-success-subtle text-success">Active</span></div>
                <div class="admin-list__item"><div><strong>Home & Kitchen</strong><div class="text-muted small">18 subcategories</div></div><span class="badge rounded-pill bg-success-subtle text-success">Active</span></div>
                <div class="admin-list__item"><div><strong>Seasonal Offers</strong><div class="text-muted small">5 subcategories</div></div><span class="badge rounded-pill bg-secondary-subtle text-secondary">Inactive</span></div>
            </div>
        </div>
    </div>
</div>

<div class="admin-panel admin-panel__body">
    <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
        <div>
            <div class="admin-stat__label">Audit</div>
            <h2 class="h5 fw-bold mb-0">Category audit log</h2>
        </div>
    </div>

    <div class="admin-table-wrap table-responsive">
        <table class="table admin-table align-middle mb-0">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Action</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($audit as $row)
                    <tr>
                        <td class="fw-semibold">{{ $row['time'] }}</td>
                        <td>{{ $row['action'] }}</td>
                        <td class="text-muted">{{ $row['meta'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title mb-0">Create / edit category</h5>
                    <small class="text-muted">Hierarchy and status only.</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Category name</label><input type="text" class="form-control" placeholder="Category name"></div>
                    <div class="col-md-6"><label class="form-label">Parent category</label><select class="form-select"><option>Top level</option><option>Electronics</option><option>Home & Kitchen</option><option>Fashion</option></select></div>
                    <div class="col-md-6"><label class="form-label">Status</label><select class="form-select"><option>Active</option><option>Inactive</option></select></div>
                    <div class="col-md-6"><label class="form-label">Display order</label><input type="number" class="form-control" value="1"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button">Save category</button>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.customer.app')

@section('title', 'Returns - ShopEase')

@section('customer_content')
<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Returns</span>
            <h1>Create a return request with the exact details support needs.</h1>
            <p>Reason, description, photo upload, and preferred resolution are all visible in one place.</p>
        </div>
        <a href="{{ route('customer.orders') }}" class="btn btn-light">Back to orders</a>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">New return</span>
                    <h3>Request a pickup or replacement</h3>
                </div>
            </div>

            <form class="customer-form-grid">
                <div class="form-group">
                    <label for="return_order">Order ID</label>
                    <input id="return_order" type="text" class="form-control" placeholder="#ORD-2048">
                </div>

                <div class="form-group">
                    <label for="return_reason">Reason</label>
                    <select id="return_reason" class="form-control">
                        <option>Damaged item</option>
                        <option>Wrong product</option>
                        <option>Missing accessory</option>
                        <option>Changed my mind</option>
                    </select>
                </div>

                <div class="form-group customer-grid-span-2">
                    <label for="return_description">Description</label>
                    <textarea id="return_description" rows="4" class="form-control" placeholder="Explain the issue in a few lines..."></textarea>
                </div>

                <div class="form-group customer-grid-span-2">
                    <label for="return_photo">Upload photo</label>
                    <input id="return_photo" type="file" class="form-control" data-image-preview data-preview-target="#return_preview">
                    <div class="customer-upload-preview" id="return_preview">
                        <i class="bi bi-image"></i>
                        <span>No image selected yet</span>
                    </div>
                </div>

                <div class="form-group customer-grid-span-2">
                    <label>Preferred resolution</label>
                    <div class="customer-chip-row customer-chip-row--tight">
                        <button type="button" class="customer-chip is-active" data-filter-chip>Refund</button>
                        <button type="button" class="customer-chip is-active" data-filter-chip>Replacement</button>
                        <button type="button" class="customer-chip is-active" data-filter-chip>Repair</button>
                    </div>
                </div>
            </form>

            <div class="customer-panel__footer">
                <button type="button" class="btn btn-primary">Submit return</button>
            </div>
        </section>

        <section class="customer-panel customer-panel--soft">
            <span class="section-kicker">Recent requests</span>
            <h3>Previously submitted returns</h3>

            <div class="customer-list-stack">
                <article class="customer-list-card">
                    <strong>#RTN-1204</strong>
                    <span>Damaged packaging • In review</span>
                </article>
                <article class="customer-list-card">
                    <strong>#RTN-1188</strong>
                    <span>Wrong size • Replacement shipped</span>
                </article>
            </div>
        </section>
    </div>
</div>
@endsection

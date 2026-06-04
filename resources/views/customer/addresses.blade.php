@extends('layouts.customer.app')

@section('title', 'Addresses - ShopEase')

@section('customer_content')
<div class="customer-page__container">
    <section class="customer-page-header">
        <span class="section-kicker">Addresses</span>
        <h1>Manage your delivery locations without losing the shopping flow.</h1>
        <p>Keep multiple saved addresses ready for checkout, returns, and support visits.</p>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Saved addresses</span>
                    <h3>Delivery destinations</h3>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm">Add new</button>
            </div>

            <div class="customer-address-grid">
                <article class="customer-address-card is-primary">
                    <div class="customer-address-card__top">
                        <strong>Home</strong>
                        <span class="customer-status-pill customer-status-pill--success">Default</span>
                    </div>
                    <p>Flat 402, River View Residency, Baner Road, Pune - 411045</p>
                    <div class="customer-address-card__meta">
                        <span>+91 98765 43210</span>
                        <span>Landmark: Metro station</span>
                    </div>
                </article>

                <article class="customer-address-card">
                    <div class="customer-address-card__top">
                        <strong>Office</strong>
                        <span class="customer-status-pill">Business</span>
                    </div>
                    <p>Tech Park, 4th Floor, Hinjewadi Phase 1, Pune - 411057</p>
                    <div class="customer-address-card__meta">
                        <span>Mon-Fri delivery preferred</span>
                        <span>Security desk check-in</span>
                    </div>
                </article>
            </div>
        </section>

        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">New address</span>
                    <h3>Add a quick delivery destination</h3>
                </div>
            </div>

            <form class="customer-form-grid">
                <div class="form-group">
                    <label for="address_name">Label</label>
                    <input id="address_name" type="text" class="form-control" placeholder="Home, Office, etc.">
                </div>
                <div class="form-group">
                    <label for="address_phone">Phone</label>
                    <input id="address_phone" type="text" class="form-control" placeholder="+91 98765 43210">
                </div>
                <div class="form-group customer-grid-span-2">
                    <label for="address_line1">Address line</label>
                    <input id="address_line1" type="text" class="form-control" placeholder="Street, building, locality">
                </div>
                <div class="form-group">
                    <label for="address_city">City</label>
                    <input id="address_city" type="text" class="form-control" placeholder="Pune">
                </div>
                <div class="form-group">
                    <label for="address_zip">PIN code</label>
                    <input id="address_zip" type="text" class="form-control" placeholder="411045">
                </div>
                <div class="form-group customer-grid-span-2">
                    <label for="address_note">Delivery instructions</label>
                    <textarea id="address_note" rows="4" class="form-control" placeholder="Call on arrival, use lift, etc."></textarea>
                </div>
            </form>

            <div class="customer-panel__footer">
                <button type="button" class="btn btn-primary">Save address</button>
                <button type="button" class="btn btn-light">Use current location</button>
            </div>
        </section>
    </div>
</div>
@endsection

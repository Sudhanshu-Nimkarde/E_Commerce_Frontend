@extends('layouts.customer.app')

@section('title', 'My Account - ShopEase')

@section('customer_content')
<div class="customer-page__container">
    <section class="customer-page-header">
        <span class="section-kicker">My account</span>
        <h1>Keep your profile, preferences, and security details in one place.</h1>
        <p>
            The layout is intentionally clean and editable-looking so it can become a real account screen once APIs
            are connected.
        </p>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Profile summary</span>
                    <h3>Personal details</h3>
                </div>
                <span class="customer-status-pill customer-status-pill--success">Verified</span>
            </div>

            <div class="customer-profile-card-large">
                <div class="avatar-chip customer-avatar-lg">{{ $customerInitial ?? 'A' }}</div>
                <div>
                    <strong>{{ $customerName ?? 'Alex Johnson' }}</strong>
                    <p>Customer role ID {{ $customerRoleId ?? 3 }} with premium workspace access.</p>
                </div>
            </div>

            <form class="customer-form-grid">
                <div class="form-group">
                    <label for="profile_name">Full name</label>
                    <input id="profile_name" type="text" class="form-control" value="{{ $customerName ?? 'Alex Johnson' }}">
                </div>
                <div class="form-group">
                    <label for="profile_email">Email</label>
                    <input id="profile_email" type="email" class="form-control" value="alex@example.com">
                </div>
                <div class="form-group">
                    <label for="profile_phone">Phone</label>
                    <input id="profile_phone" type="text" class="form-control" value="+91 98765 43210">
                </div>
                <div class="form-group">
                    <label for="profile_username">Username</label>
                    <input id="profile_username" type="text" class="form-control" value="alex.customer">
                </div>
            </form>

            <div class="customer-panel__footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-light">Cancel</button>
            </div>
        </section>

        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Preferences</span>
                    <h3>Notifications and shopping defaults</h3>
                </div>
            </div>

            <div class="customer-toggle-list">
                <label class="customer-toggle-row">
                    <span>
                        <strong>Delivery alerts</strong>
                        <small>Get SMS and email status for each order stage.</small>
                    </span>
                    <span class="customer-switch is-on"></span>
                </label>

                <label class="customer-toggle-row">
                    <span>
                        <strong>Deal reminders</strong>
                        <small>Receive curated offers based on your wishlist.</small>
                    </span>
                    <span class="customer-switch is-on"></span>
                </label>

                <label class="customer-toggle-row">
                    <span>
                        <strong>Default address</strong>
                        <small>Use the primary delivery address automatically.</small>
                    </span>
                    <select class="form-control">
                        <option>Home - Pune</option>
                        <option>Office - Pune</option>
                    </select>
                </label>

                <label class="customer-toggle-row">
                    <span>
                        <strong>Language</strong>
                        <small>Keep the interface friendly for your region.</small>
                    </span>
                    <select class="form-control">
                        <option>English</option>
                        <option>हिंदी</option>
                        <option>मराठी</option>
                    </select>
                </label>
            </div>
        </section>
    </div>

    <div class="spacer-24"></div>

    <div class="customer-grid customer-grid--3">
        <section class="customer-mini-card">
            <span class="customer-mini-card__label">Security</span>
            <strong>Change password</strong>
            <p>Keep credentials fresh with a clean reset flow later.</p>
        </section>

        <section class="customer-mini-card">
            <span class="customer-mini-card__label">Devices</span>
            <strong>1 active session</strong>
            <p>Desktop session is currently active and trusted.</p>
        </section>

        <section class="customer-mini-card">
            <span class="customer-mini-card__label">Membership</span>
            <strong>Premium customer</strong>
            <p>Shopping, support, and returns are available in one place.</p>
        </section>
    </div>
</div>
@endsection

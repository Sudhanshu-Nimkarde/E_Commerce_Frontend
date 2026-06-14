@extends('layouts.vendor.app')

@section('title', 'Discounts & Marketing - ShopEase Vendor')

@section('vendor_content')
@php
    $campaignTone = [
        'Active' => 'is-success',
        'Scheduled' => 'is-warning',
        'Draft' => 'is-muted',
        'Paused' => 'is-danger',
    ];
@endphp

<div class="vendor-page-header">
    <div>
        <span class="vendor-kicker">Discounts &amp; Marketing</span>
        <h1 class="vendor-page-title">Campaigns, coupons, and simple promotion planning</h1>
        <p class="vendor-page-desc">
            Clean, readable marketing controls with static data and no heavy interactions. Everything is designed for quick future API binding.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Create coupon</button>
        <button type="button" class="btn btn-primary">Launch campaign</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($discountStats as $stat)
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
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Campaign table</h2>
                <p class="vendor-table-card__sub">Promotion overview with readable status chips and channel tags.</p>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle">
                    <thead>
                        <tr>
                            <th>Campaign</th>
                            <th>Discount</th>
                            <th>Channel</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaignRows as $campaign)
                            <tr>
                                <td class="fw-semibold">{{ $campaign['name'] }}</td>
                                <td>{{ $campaign['type'] }}</td>
                                <td>{{ $campaign['channel'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $campaignTone[$campaign['status']] ?? 'is-muted' }}">
                                        {{ $campaign['status'] }}
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
                    <h3>Coupon planner</h3>
                    <p>Simple form layout for future coupon creation APIs.</p>
                </div>

                <div class="d-grid gap-3">
                    <div>
                        <label class="form-label text-muted small mb-1">Coupon code</label>
                        <input type="text" class="form-control vendor-input" value="SAVE12">
                    </div>
                    <div>
                        <label class="form-label text-muted small mb-1">Discount type</label>
                        <select class="form-select vendor-input">
                            <option>Flat discount</option>
                            <option>Percentage</option>
                            <option>Buy X Get Y</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label text-muted small mb-1">Usage limit</label>
                        <input type="text" class="form-control vendor-input" value="250 redemptions">
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary">Save coupon</button>
                        <button type="button" class="btn btn-outline-secondary">Schedule</button>
                    </div>
                </div>
            </div>

            <div class="vendor-form-card flex-grow-1">
                <div class="vendor-form-card__header">
                    <h3>Channel performance</h3>
                    <p>Short metrics for email, banner, and social reach.</p>
                </div>

                <div class="vendor-mini-list">
                    @foreach ($channelRows as $channel)
                        <div class="vendor-mini-list__item">
                            <div>
                                <strong>{{ $channel['name'] }}</strong>
                                <span>{{ $channel['metric'] }}</span>
                            </div>
                            <span class="vendor-pill vendor-pill--success">{{ $channel['trend'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-6">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Active coupons</h2>
                <p class="vendor-table-card__sub">Coupon snapshot for quick review.</p>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Usage</th>
                            <th>Expiry</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($couponRows as $coupon)
                            <tr>
                                <td class="fw-semibold">{{ $coupon['code'] }}</td>
                                <td>{{ $coupon['usage'] }}</td>
                                <td>{{ $coupon['expiry'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $campaignTone[$coupon['status']] ?? 'is-muted' }}">
                                        {{ $coupon['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Promo schedule</h3>
                <p>A light checklist for campaign timing and merchandising tasks.</p>
            </div>

            <div class="vendor-checklist">
                <div class="vendor-checklist__item"><strong>Banner live</strong><span>Homepage promotion is active</span></div>
                <div class="vendor-checklist__item"><strong>Email draft</strong><span>Newsletter copy queued for review</span></div>
                <div class="vendor-checklist__item"><strong>Ad budget</strong><span>Daily spend limited to current plan</span></div>
                <div class="vendor-checklist__item"><strong>Campaign expiry</strong><span>Weekend flash sale closes Sunday</span></div>
            </div>

            <div class="vendor-divider my-4"></div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="vendor-soft-card h-100">
                        <strong class="d-block mb-2">Promo calendar</strong>
                        <div class="text-muted small">A simple placeholder card for scheduling view integration.</div>
                        <div class="mt-3 vendor-pill vendor-pill--accent">Calendar placeholder</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="vendor-soft-card h-100">
                        <strong class="d-block mb-2">Offer rules</strong>
                        <div class="text-muted small">Combination rules, exclusions, and storewide caps.</div>
                        <div class="mt-3 vendor-pill vendor-pill--warning">Rules ready</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

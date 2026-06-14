@extends('layouts.vendor.app')

@section('title', 'Customer Interaction - ShopEase Vendor')

@section('vendor_content')
@php
    $reviewTone = ['5.0' => 'is-success', '4.5' => 'is-success', '4.0' => 'is-warning'];
@endphp

<div class="vendor-page-header">
    <div>
        <span class="vendor-kicker">Customer Interaction</span>
        <h1 class="vendor-page-title">Messages, reviews, and support follow-up</h1>
        <p class="vendor-page-desc">
            An inbox-style vendor screen built with simple cards and responsive columns so customer workflows stay readable on all devices.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Saved replies</button>
        <button type="button" class="btn btn-primary">Reply now</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($interactionStats as $stat)
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="vendor-stat-card h-100">
                <div class="vendor-stat-card__label">{{ $stat['label'] }}</div>
                <div class="vendor-stat-card__value">{{ $stat['value'] }}</div>
                <div class="vendor-stat-card__meta">{{ $stat['meta'] }}</div>
            </div>
        </div>
    @endforeach
</div>

<div class="vendor-inbox mb-4">
    <div class="vendor-inbox__list">
        <div class="vendor-inbox__list-header d-flex flex-wrap justify-content-between align-items-start gap-2">
            <div>
                <h2 class="vendor-table-card__title">Conversation list</h2>
                <p class="vendor-table-card__sub">Searchable, lightweight inbox layout.</p>
            </div>
            <label class="vendor-search w-100" style="max-width: 300px;">
                <i class="bi bi-search"></i>
                <input
                    type="search"
                    placeholder="Search customer or subject..."
                    aria-label="Search conversations"
                    data-vendor-filter-input="#conversationRows"
                >
                <button type="button">Filter</button>
            </label>
        </div>

        <div class="vendor-inbox__items" id="conversationRows">
            @foreach ($conversationRows as $conversation)
                <div class="vendor-inbox__item {{ $loop->first ? 'is-active' : '' }}" data-vendor-filter-row data-filter-text="{{ implode(' ', $conversation) }}">
                    <div class="d-flex justify-content-between gap-2">
                        <strong>{{ $conversation['customer'] }}</strong>
                        <span class="text-muted small">{{ $conversation['time'] }}</span>
                    </div>
                    <span>{{ $conversation['subject'] }}</span>
                    <span class="text-muted">{{ $conversation['preview'] }}</span>
                    <div>
                        <span class="vendor-status-badge {{ $conversation['status'] === 'Open' ? 'is-warning' : ($conversation['status'] === 'Escalated' ? 'is-danger' : 'is-success') }}">
                            {{ $conversation['status'] }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="vendor-inbox__thread">
        <div class="vendor-inbox__thread-header d-flex flex-wrap justify-content-between align-items-start gap-2">
            <div>
                <h2 class="vendor-table-card__title">Conversation thread</h2>
                <p class="vendor-table-card__sub">A clean message panel with quick reply buttons.</p>
            </div>
            <span class="vendor-pill vendor-pill--accent">Open conversation</span>
        </div>

        <div class="vendor-thread">
            @foreach ($messageThread as $message)
                <div class="vendor-thread__message {{ $message['author'] === 'Support' ? 'is-self' : '' }}">
                    <strong>{{ $message['author'] }}</strong>
                    <span>{{ $message['message'] }}</span>
                    <div class="text-muted small mt-2">{{ $message['time'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="px-3 pb-3">
            <div class="vendor-divider my-2"></div>
            <div class="vendor-quick-replies mb-3">
                <button type="button" class="btn btn-outline-secondary btn-sm">Shipping update</button>
                <button type="button" class="btn btn-outline-secondary btn-sm">Return guidance</button>
                <button type="button" class="btn btn-outline-secondary btn-sm">Product compatibility</button>
            </div>
            <textarea class="form-control vendor-input mb-3" rows="4" placeholder="Write a reply..."></textarea>
            <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn btn-primary">Send reply</button>
                <button type="button" class="btn btn-outline-secondary">Save draft</button>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-6">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Recent reviews</h2>
                <p class="vendor-table-card__sub">Readable review moderation UI.</p>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviewRows as $review)
                            <tr>
                                <td class="fw-semibold">{{ $review['name'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $reviewTone[$review['rating']] ?? 'is-muted' }}">
                                        {{ $review['rating'] }}
                                    </span>
                                </td>
                                <td>{{ $review['note'] }}</td>
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
                <h3>Reply templates</h3>
                <p>Prewritten text blocks for faster response handling.</p>
            </div>

            <div class="vendor-mini-list">
                @foreach ($templateRows as $template)
                    <div class="vendor-mini-list__item">
                        <div>
                            <strong>{{ $template['title'] }}</strong>
                            <span>{{ $template['copy'] }}</span>
                        </div>
                        <button type="button" class="btn btn-outline-secondary btn-sm">Use</button>
                    </div>
                @endforeach
            </div>

            <div class="vendor-divider my-4"></div>

            <div class="vendor-checklist">
                <div class="vendor-checklist__item"><strong>Support SLA</strong><span>Reply within 2 hours during business time</span></div>
                <div class="vendor-checklist__item"><strong>Review moderation</strong><span>Flag issues before public display</span></div>
                <div class="vendor-checklist__item"><strong>Return workflow</strong><span>Use the same clean flow later for API actions</span></div>
            </div>
        </div>
    </div>
</div>
@endsection

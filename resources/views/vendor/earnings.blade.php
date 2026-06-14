@extends('layouts.vendor.app')

@section('title', 'Earnings - ShopEase Vendor')

@section('vendor_content')
<div class="vendor-page-header">
    <div>
        <span class="vendor-kicker">Earnings</span>
        <h1 class="vendor-page-title">Revenue, commissions, payouts, and settlement overview</h1>
        <p class="vendor-page-desc">
            A clean earnings workspace with static KPI cards, a placeholder trend chart, and simple payout tables.
        </p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-secondary">Export report</button>
        <button type="button" class="btn btn-primary">View settlement</button>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach ($earningsStats as $stat)
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
        <div class="vendor-chart-card h-100">
            <div class="vendor-chart">
                <div class="vendor-chart__meta">
                    <div>
                        <h2 class="vendor-panel__title">Revenue trend</h2>
                        <p class="vendor-panel__sub">Static placeholder for a future chart library.</p>
                    </div>
                    <span class="vendor-pill vendor-pill--accent">30 day view</span>
                </div>

                <div class="vendor-chart__bars">
                    @foreach ([36, 42, 48, 55, 49, 62, 58, 71, 66, 74, 78, 84] as $bar)
                        <span class="vendor-chart__bar" style="height: {{ $bar }}%;"></span>
                    @endforeach
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-4">
                        <div class="vendor-soft-card h-100">
                            <strong class="d-block mb-1">Gross revenue</strong>
                            <div class="text-muted small">Clean revenue summary for reporting.</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="vendor-soft-card h-100">
                            <strong class="d-block mb-1">Orders revenue</strong>
                            <div class="text-muted small">Product and bundle sales combined.</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="vendor-soft-card h-100">
                            <strong class="d-block mb-1">Net payout</strong>
                            <div class="text-muted small">Amount after fees and reserves.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Commission breakdown</h3>
                <p>Clear fee structure for each product segment.</p>
            </div>

            <div class="vendor-mini-list">
                @foreach ($commissionRows as $row)
                    <div class="vendor-mini-list__item">
                        <div>
                            <strong>{{ $row['segment'] }}</strong>
                            <span>{{ $row['note'] }}</span>
                        </div>
                        <span class="vendor-pill vendor-pill--success">{{ $row['rate'] }}</span>
                    </div>
                @endforeach
            </div>

            <div class="vendor-divider my-4"></div>

            <div class="vendor-checklist">
                @foreach ($earningNotes as $note)
                    <div class="vendor-checklist__item">
                        <strong>Earnings note</strong>
                        <span>{{ $note }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-7">
        <div class="vendor-table-card h-100">
            <div class="vendor-table-card__header">
                <h2 class="vendor-table-card__title">Payout history</h2>
                <p class="vendor-table-card__sub">A stable table for future settlement reporting.</p>
            </div>

            <div class="table-responsive">
                <table class="table vendor-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Reference</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payoutRows as $payout)
                            <tr>
                                <td>{{ $payout['date'] }}</td>
                                <td class="fw-semibold">{{ $payout['reference'] }}</td>
                                <td class="fw-semibold">{{ $payout['amount'] }}</td>
                                <td>
                                    <span class="vendor-status-badge {{ $payout['status'] === 'Completed' ? 'is-success' : 'is-warning' }}">
                                        {{ $payout['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="vendor-form-card h-100">
            <div class="vendor-form-card__header">
                <h3>Settlement controls</h3>
                <p>Basic form UI reserved for future payout settings.</p>
            </div>

            <div class="d-grid gap-3">
                <div>
                    <label class="form-label text-muted small mb-1">Payout method</label>
                    <input type="text" class="form-control vendor-input" value="Bank transfer">
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">Settlement cycle</label>
                    <select class="form-select vendor-input">
                        <option>Weekly</option>
                        <option>Bi-weekly</option>
                        <option>Monthly</option>
                    </select>
                </div>
                <div>
                    <label class="form-label text-muted small mb-1">Notes</label>
                    <textarea class="form-control vendor-input" rows="4">Settlement amounts are shown after platform commissions and refund reserves.</textarea>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary">Save settings</button>
                    <button type="button" class="btn btn-outline-secondary">Download statement</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin.app')

@section('title', 'Security - ShopEase')

@section('main_content')
<div class="admin-page-header">
    <div>
        <span class="admin-kicker">Security</span>
        <h1 class="admin-page-title">Admin security and MFA</h1>
        <p class="admin-page-desc">MFA status, allowlist placeholders, timeout warning, and masked data samples.</p>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-primary">Add allowlist IP</button>
        <button class="btn btn-primary">Review sessions</button>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">MFA</div><div class="admin-stat__value">Enabled</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Trusted IPs</div><div class="admin-stat__value">6</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Sessions</div><div class="admin-stat__value">3</div></div></div>
    <div class="col-md-3 col-6"><div class="admin-panel admin-stat"><div class="admin-stat__label">Timeout</div><div class="admin-stat__value">12m</div></div></div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">MFA</div>
                    <h2 class="h5 fw-bold mb-0">Status</h2>
                </div>
                <span class="badge rounded-pill bg-success-subtle text-success">Active</span>
            </div>

            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between gap-2">
                    <div>
                        <strong>Authenticator app</strong>
                        <div class="text-muted small">Primary second factor</div>
                    </div>
                    <span class="badge rounded-pill bg-success-subtle text-success">Synced</span>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between gap-2">
                    <div>
                        <strong>Backup codes</strong>
                        <div class="text-muted small">Emergency recovery access</div>
                    </div>
                    <span class="badge rounded-pill bg-warning-subtle text-warning">8 remaining</span>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-outline-primary">Reset MFA</button>
                <button class="btn btn-primary">Regenerate codes</button>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Allowlist</div>
                    <h2 class="h5 fw-bold mb-0">IP allowlist</h2>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <label class="form-label">Add IP address</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="203.0.113.10">
                    <button class="btn btn-primary" type="button">Add</button>
                </div>
            </div>

            <div class="admin-allowlist">
                <div class="admin-allowlist__item"><div><strong>203.0.113.10</strong><div class="text-muted small">Office network</div></div><span class="badge rounded-pill bg-success-subtle text-success">Trusted</span></div>
                <div class="admin-allowlist__item"><div><strong>198.51.100.22</strong><div class="text-muted small">Laptop backup route</div></div><span class="badge rounded-pill bg-success-subtle text-success">Trusted</span></div>
                <div class="admin-allowlist__item"><div><strong>192.0.2.45</strong><div class="text-muted small">Temporary review access</div></div><span class="badge rounded-pill bg-warning-subtle text-warning">Expiring</span></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Session</div>
                    <h2 class="h5 fw-bold mb-0">Timeout warning</h2>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <div class="d-flex justify-content-between mb-2"><span>Current session expires in</span><strong>12 minutes</strong></div>
                <div class="progress" style="height: 8px;"><div class="progress-bar bg-warning" style="width: 68%"></div></div>
            </div>

            <div class="admin-soft">
                <div class="d-flex justify-content-between gap-2">
                    <div>
                        <strong>Warning state</strong>
                        <div class="text-muted small">Show a clear nudge before timeout.</div>
                    </div>
                    <span class="badge rounded-pill bg-warning-subtle text-warning">Visible</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="admin-panel admin-panel__body h-100">
            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <div class="admin-stat__label">Masking</div>
                    <h2 class="h5 fw-bold mb-0">Sensitive data samples</h2>
                </div>
            </div>

            <div class="admin-soft mb-3">
                <div class="admin-stat__label">Email</div>
                <div class="fw-semibold">admin@sho***.com</div>
            </div>
            <div class="admin-soft mb-3">
                <div class="admin-stat__label">Phone</div>
                <div class="fw-semibold">+91 98** **45 22</div>
            </div>
            <div class="admin-soft">
                <div class="admin-stat__label">Token</div>
                <div class="fw-semibold">sk_live_********************************</div>
            </div>
        </div>
    </div>
</div>
@endsection

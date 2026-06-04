@extends('layouts.customer.app')

@section('title', 'Complaints - ShopEase')

@section('customer_content')
<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Complaints</span>
            <h1>Escalate issues with a visible SLA timeline and communication trail.</h1>
            <p>Ideal for premium customer handling when a support ticket needs a stronger resolution path.</p>
        </div>
        <a href="{{ route('customer.support.tickets') }}" class="btn btn-primary">Open support ticket</a>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Complaint status</span>
                    <h3>#CMP-1182</h3>
                </div>
                <span class="customer-status-pill customer-status-pill--danger">Under review</span>
            </div>

            <div class="customer-sla-timeline">
                <div class="customer-sla-step is-complete">
                    <strong>Raised</strong>
                    <span>Jun 1, 2026</span>
                </div>
                <div class="customer-sla-step is-complete">
                    <strong>Assigned</strong>
                    <span>Support lead</span>
                </div>
                <div class="customer-sla-step is-active">
                    <strong>Investigating</strong>
                    <span>ETA 4 hours</span>
                </div>
                <div class="customer-sla-step">
                    <strong>Resolution</strong>
                    <span>Pending</span>
                </div>
            </div>
        </section>

        <section class="customer-panel customer-panel--soft">
            <span class="section-kicker">Communication trail</span>
            <h3>Escalation messages</h3>

            <div class="customer-thread">
                <article class="customer-thread__message customer-thread__message--customer">
                    <strong>You</strong>
                    <p>The refund was delayed even after confirmation. I need an urgent update.</p>
                </article>

                <article class="customer-thread__message customer-thread__message--agent">
                    <strong>Escalation desk</strong>
                    <p>Your complaint is assigned to the senior support queue and will be reviewed today.</p>
                </article>

                <article class="customer-thread__message customer-thread__message--system">
                    <strong>SLA note</strong>
                    <p>Target response time is 4 hours and final closure goal is 24 hours.</p>
                </article>
            </div>

            <div class="customer-mini-note">
                <strong>Resolution path</strong>
                <span>Reimbursement, replacement, or manual intervention can be shown here later.</span>
            </div>
        </section>
    </div>
</div>
@endsection

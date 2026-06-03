@extends('layouts.customer.app')

@section('title', 'Support Tickets - ShopEase')

@section('customer_content')
<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Support tickets</span>
            <h1>Create a ticket, follow the thread, and keep the conversation visible.</h1>
            <p>Matches the SRS requirement for ticket creation, ticket list, and ticket thread / reply UI.</p>
        </div>
        <a href="{{ route('customer.complaints') }}" class="btn btn-outline-primary">Escalations</a>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Create ticket</span>
                    <h3>Raise a support request</h3>
                </div>
            </div>

            <form class="customer-form-grid">
                <div class="form-group">
                    <label for="ticket_subject">Subject</label>
                    <input id="ticket_subject" type="text" class="form-control" placeholder="Order missing from tracking">
                </div>
                <div class="form-group">
                    <label for="ticket_category">Category</label>
                    <select id="ticket_category" class="form-control">
                        <option>Order issue</option>
                        <option>Refund</option>
                        <option>Account access</option>
                        <option>Delivery delay</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ticket_priority">Priority</label>
                    <select id="ticket_priority" class="form-control">
                        <option>Low</option>
                        <option selected>Medium</option>
                        <option>High</option>
                        <option>Urgent</option>
                    </select>
                </div>
                <div class="form-group customer-grid-span-2">
                    <label for="ticket_message">Message</label>
                    <textarea id="ticket_message" rows="4" class="form-control" placeholder="Explain the issue with order number, product name, and what help you need."></textarea>
                </div>
                <div class="form-group customer-grid-span-2">
                    <label for="ticket_attachment">Attachment</label>
                    <input id="ticket_attachment" type="file" class="form-control" data-image-preview data-preview-target="#ticket_preview">
                    <div class="customer-upload-preview" id="ticket_preview">
                        <i class="bi bi-paperclip"></i>
                        <span>Attach screenshots or receipts</span>
                    </div>
                </div>
            </form>

            <div class="customer-panel__footer">
                <button type="button" class="btn btn-primary">Submit ticket</button>
            </div>
        </section>

        <section class="customer-panel customer-panel--soft">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Ticket list</span>
                    <h3>Active conversations</h3>
                </div>
            </div>

            <div class="customer-tab-bar" data-customer-tabs>
                <button type="button" class="customer-chip is-active" data-tab-button="open" aria-selected="true">Open</button>
                <button type="button" class="customer-chip" data-tab-button="archived" aria-selected="false">Archived</button>
            </div>

            <div class="customer-tab-panel is-active" data-tab-panel="open">
                <div class="customer-ticket-list">
                    <article class="customer-ticket-card is-active">
                        <div class="customer-ticket-card__top">
                            <strong>#TKT-2045</strong>
                            <span class="customer-status-pill customer-status-pill--warning">Awaiting reply</span>
                        </div>
                        <p>Order missing from tracking</p>
                        <small>Last reply 12 minutes ago</small>
                    </article>

                    <article class="customer-ticket-card">
                        <div class="customer-ticket-card__top">
                            <strong>#TKT-2041</strong>
                            <span class="customer-status-pill customer-status-pill--warning">High priority</span>
                        </div>
                        <p>Login assistance after password reset</p>
                        <small>Waiting for customer confirmation</small>
                    </article>
                </div>

                <div class="customer-thread">
                    <article class="customer-thread__message customer-thread__message--customer">
                        <strong>You</strong>
                        <p>My parcel is still not updating after shipped status. Can you check?</p>
                    </article>
                    <article class="customer-thread__message customer-thread__message--agent">
                        <strong>Support</strong>
                        <p>We are checking the courier feed. Please hold while we review the scan update.</p>
                    </article>
                </div>

                <label class="customer-reply-box">
                    <span>Reply</span>
                    <textarea rows="3" class="form-control" placeholder="Type a new message..."></textarea>
                </label>

                <button type="button" class="btn btn-outline-primary w-100">Send reply</button>
            </div>

            <div class="customer-tab-panel" data-tab-panel="archived" hidden>
                <div class="customer-list-stack">
                    <article class="customer-list-card">
                        <strong>#TKT-2038</strong>
                        <span>Refund request for late delivery • Resolved yesterday</span>
                    </article>
                    <article class="customer-list-card">
                        <strong>#TKT-2029</strong>
                        <span>Address change request • Closed last week</span>
                    </article>
                    <div class="customer-empty-state customer-empty-state--compact">
                        <i class="bi bi-inbox"></i>
                        <strong>No more archived tickets</strong>
                        <span>Older conversations will appear here after resolution.</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

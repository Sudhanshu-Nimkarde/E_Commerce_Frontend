@extends('layouts.customer.app')

@section('title', 'Reviews - ShopEase')

@section('customer_content')
<div class="customer-page__container">
    <section class="customer-page-header customer-page-header--split">
        <div>
            <span class="section-kicker">Reviews &amp; ratings</span>
            <h1>Write a polished review with star selection and image uploads.</h1>
            <p>Verified purchase signals, photo evidence, and clear comments are ready for API integration later.</p>
        </div>
        <a href="{{ route('customer.orders') }}" class="btn btn-light">Review an order</a>
    </section>

    <div class="customer-grid customer-grid--2">
        <section class="customer-panel">
            <div class="customer-panel__header">
                <div>
                    <span class="section-kicker">Write a review</span>
                    <h3>Share your experience</h3>
                </div>
            </div>

            <div class="customer-rating-picker" data-rating-group>
                <div class="customer-rating-stars">
                    <button type="button" class="customer-star-button" data-rating-button aria-label="1 star">
                        <i class="bi bi-star-fill"></i>
                    </button>
                    <button type="button" class="customer-star-button" data-rating-button aria-label="2 stars">
                        <i class="bi bi-star-fill"></i>
                    </button>
                    <button type="button" class="customer-star-button" data-rating-button aria-label="3 stars">
                        <i class="bi bi-star-fill"></i>
                    </button>
                    <button type="button" class="customer-star-button" data-rating-button aria-label="4 stars">
                        <i class="bi bi-star-fill"></i>
                    </button>
                    <button type="button" class="customer-star-button" data-rating-button aria-label="5 stars">
                        <i class="bi bi-star-fill"></i>
                    </button>
                </div>
            </div>

            <form class="customer-form-grid">
                <div class="form-group customer-grid-span-2">
                    <label for="review_text">Review</label>
                    <textarea id="review_text" rows="5" class="form-control" placeholder="Tell other shoppers what you liked or what could improve..."></textarea>
                </div>

                <div class="form-group customer-grid-span-2">
                    <label for="review_photos">Upload photos</label>
                    <input id="review_photos" type="file" class="form-control" multiple data-image-preview data-preview-target="#review_preview">
                    <div class="customer-upload-preview customer-upload-preview--stack" id="review_preview">
                        <i class="bi bi-camera"></i>
                        <span>Add up to 3 images</span>
                    </div>
                </div>
            </form>

            <div class="customer-panel__footer">
                <span class="customer-status-pill customer-status-pill--success">Verified purchase</span>
                <button type="button" class="btn btn-primary">Publish review</button>
            </div>
        </section>

        <section class="customer-panel customer-panel--soft">
            <span class="section-kicker">Recent reviews</span>
            <h3>What customers are saying</h3>

            <div class="customer-review-feed">
                <article class="customer-review-card">
                    <div class="customer-review-card__head">
                        <strong>Riya</strong>
                        <span class="customer-status-pill customer-status-pill--success">Verified purchase</span>
                    </div>
                    <div class="customer-rating customer-rating--inline">
                        <i class="bi bi-star-fill"></i>
                        <span>5.0</span>
                    </div>
                    <p>The product arrived quickly and the packaging was neat. Great shopping flow.</p>
                </article>

                <article class="customer-review-card">
                    <div class="customer-review-card__head">
                        <strong>Aman</strong>
                        <span class="customer-status-pill customer-status-pill--success">Verified purchase</span>
                    </div>
                    <div class="customer-rating customer-rating--inline">
                        <i class="bi bi-star-fill"></i>
                        <span>4.7</span>
                    </div>
                    <p>The new customer dashboard makes it easy to find the right order before reviewing.</p>
                </article>
            </div>
        </section>
    </div>
</div>
@endsection

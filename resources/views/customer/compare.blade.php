@extends('layouts.customer.app')

@section('title', 'Compare - ShopEase')

@section('customer_content')
<div class="customer-page__container">
    <section class="customer-page-header">
        <span class="section-kicker">Compare products</span>
        <h1>Side-by-side comparison that helps shoppers decide faster.</h1>
        <p>Highlight the differences that matter without hiding price, rating, or availability.</p>
    </section>

    <section class="customer-panel">
        <div class="customer-panel__header">
            <div>
                <span class="section-kicker">Selected items</span>
                <h3>Three products in the same shopping lane</h3>
            </div>
            <button type="button" class="btn btn-outline-primary btn-sm">Add product</button>
        </div>

        <div class="customer-compare-grid">
            <article class="customer-compare-card">
                <span class="customer-compare-card__tag">Best value</span>
                <strong>Noise Cancelling Headphones</strong>
                <span class="customer-compare-card__price">₹4,999</span>
                <small>4.8 rating • In stock</small>
            </article>

            <article class="customer-compare-card is-featured">
                <span class="customer-compare-card__tag">Most popular</span>
                <strong>Smart Watch Series 5</strong>
                <span class="customer-compare-card__price">₹7,299</span>
                <small>4.7 rating • Fast delivery</small>
            </article>

            <article class="customer-compare-card">
                <span class="customer-compare-card__tag">Budget pick</span>
                <strong>Bluetooth Speaker</strong>
                <span class="customer-compare-card__price">₹2,299</span>
                <small>4.6 rating • Limited stock</small>
            </article>
        </div>

        <div class="customer-compare-table-wrap">
            <table class="customer-compare-table">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th>Headphones</th>
                        <th>Smart Watch</th>
                        <th>Speaker</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Noise cancellation</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>Battery life</td>
                        <td>20 hours</td>
                        <td>36 hours</td>
                        <td>12 hours</td>
                    </tr>
                    <tr>
                        <td>Warranty</td>
                        <td>1 year</td>
                        <td>1 year</td>
                        <td>6 months</td>
                    </tr>
                    <tr>
                        <td>Delivery</td>
                        <td>Same day</td>
                        <td>Next day</td>
                        <td>Same day</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

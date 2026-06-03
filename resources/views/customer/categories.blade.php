@extends('layouts.customer.app')

@section('title', 'Categories - ShopEase')

@section('customer_content')
@php
    $categories = [
        ['name' => 'Electronics', 'meta' => 'Smart devices and accessories', 'icon' => 'bi-lightning-charge-fill'],
        ['name' => 'Home & Kitchen', 'meta' => 'Everyday living essentials', 'icon' => 'bi-house-heart'],
        ['name' => 'Fashion', 'meta' => 'Style and seasonal trends', 'icon' => 'bi-bag-heart'],
        ['name' => 'Beauty', 'meta' => 'Skincare and grooming picks', 'icon' => 'bi-gem'],
        ['name' => 'Audio', 'meta' => 'Headphones, speakers, and more', 'icon' => 'bi-headphones'],
        ['name' => 'Gaming', 'meta' => 'Play and streaming gear', 'icon' => 'bi-controller'],
    ];
@endphp

<div class="customer-page__container">
    <section class="customer-page-header">
        <span class="section-kicker">Categories</span>
        <h1>Explore a clean category browser built for quick discovery.</h1>
        <p>Each tile gives customers a fast way to jump into their preferred shopping lane.</p>
    </section>

    <section class="customer-category-hero">
        <div>
            <span class="customer-category-hero__label">Curated shopping</span>
            <h2>Unique category presentation with helpful sub-collections and offers.</h2>
            <p>Use the grid to surface promotions, seasonal trends, and shopping shortcuts.</p>
        </div>
        <a href="{{ route('customer.products') }}" class="btn btn-light">Explore products</a>
    </section>

    <div class="customer-category-grid">
        @foreach ($categories as $category)
            <article class="customer-category-card">
                <span class="customer-category-card__icon">
                    <i class="bi {{ $category['icon'] }}"></i>
                </span>
                <h3>{{ $category['name'] }}</h3>
                <p>{{ $category['meta'] }}</p>
                <a href="{{ route('customer.products') }}" class="customer-category-card__link">Browse collection</a>
            </article>
        @endforeach
    </div>
</div>
@endsection

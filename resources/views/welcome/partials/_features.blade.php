<section class="section features-bg" id="features">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-label blue">✨ Fitur Unggulan</div>
            <h2 class="section-title">Dirancang Khusus untuk Bisnis di Indonesia</h2>
            <p class="section-desc">Dari warung kopi hingga restoran besar, Sagansa POS memiliki semua yang Anda butuhkan untuk mengelola bisnis lebih efisien.</p>
        </div>
        <div class="features-grid">
            @foreach($features as $feature)
                <div class="feature-card animate-in">
                    @if(!empty($feature->image_url))
                        <img src="{{ $feature->image_url }}" alt="{{ $feature->title }}" class="feature-image" loading="lazy">
                    @else
                        <div class="feature-icon {{ $feature->color }}">{{ $feature->icon }}</div>
                    @endif
                    <h3>{{ $feature->title }}</h3>
                    <p>{{ $feature->short_description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

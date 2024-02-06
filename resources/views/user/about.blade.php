@extends('user.layouts.master')

@section('content')
<div class="py-3 text-center">
    <div>
        <div class="hero min-h-screen bg-base-200 rounded-2xl">
            <div class="hero-content flex-col lg:flex-row-reverse">
                <img src="https://storage.googleapis.com/inditech-storage/hero.jpg" class="max-w-sm rounded-lg shadow-2xl" />
                <div>
                <h1 class="text-5xl font-bold">Halo, Aku Prinafsika 👋🏻</h1>
                <p class="py-6">Ini adalah latihan awal dari pembelajaran Magang dari <span class="text-sky-500">PT Indi Technology International</span>. Membuat website blog sederhana dengan Laravel dan sambil belajar untuk mendalaminya.</p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold py-6">Tailwind + Daisyui</h2>
        <div class="carousel carousel-center rounded-box">
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.jpg" alt="Pizza" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.jpg" alt="Pizza" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1572635148818-ef6fd45eb394.jpg" alt="Pizza" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1494253109108-2e30c049369b.jpg" alt="Pizza" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1550258987-190a2d41a8ba.jpg" alt="Pizza" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1559181567-c3190ca9959b.jpg" alt="Pizza" />
            </div> 
            <div class="carousel-item">
                <img src="https://daisyui.com/images/stock/photo-1601004890684-d8cbf643f5f2.jpg" alt="Pizza" />
            </div>
        </div>
        <div class="py-3">
            <h2 class="text-3xl font-bold py-3">Laravel Breeze</h2>
            <div class="mockup-code">
                <pre data-prefix="$"><code class="text-warning">composer require laravel/breeze</code></pre>
            </div>
        </div>
    </div>
</div>
@endsection
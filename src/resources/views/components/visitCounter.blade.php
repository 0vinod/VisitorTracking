{{-- packages/Omninet/VisitorTracking/src/resources/views/components/visitCounter.blade.php --}}
 
<div class="visitor-counter">
    <div class="counter-box">
        <span class="counter-label">Total Visitors: </span>
        <span class="counter-number">{{ $totalVisitor }}</span>
    </div>
</div>

<style>
    .visitor-counter {
        justify-content: center;
        align-items: center;
        font-family: Arial, sans-serif;
        width: max-content;
    }

    .counter-box {
        display: flex;
        background: #f5f7fb;
        padding: 15px 25px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .counter-label {
        display: block;
        font-size: 14px;
        color: #666;
    }

    .counter-number {
        font-size: 15px;
        font-weight: bold;
        color: #2c3e50;
    }
</style>

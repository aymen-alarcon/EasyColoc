@include("includes.header")
<div class="form-container">
    <h1>Payment Successful!</h1>
    <form action="/Payments/Store/{{ $depense->id }}" method="POST" id="RegisterForm">
        @method("POST")
        @csrf
        <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" id="name" name="name" value="{{ $session->customer_details->name }}" readonly>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" id="amount" name="total_price" value="{{ number_format($session->amount_total / 100, 2) }}" readonly>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" value="{{ number_format($session->amount_total / 100, 2) }}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Payment Status</label>
            <input type="text" id="status" name="status" value="{{ $session->payment_status }}" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ $session->customer_details->email}}" readonly>
        </div>

        <div class="form-group">
            <label for="method">Payment Method</label>
            <input type="text" id="method" name="method" value="{{ $session->payment_method_types[0]}}" readonly>
        </div>

        <div class="form-group">
            <label for="method">Currency</label>
            <input type="text" id="method" name="currency" value="{{ $session->currency }}" readonly>
        </div>

        <button type="submit" class="btn">Save Submit</button>
    </form>
</div>
<script>
    window.addEventListener("load", ()=>{
        setTimeout(() => {
            document.forms["RegisterForm"].submit()
        }, 1000);
    })
</script>
@include("includes.footer")
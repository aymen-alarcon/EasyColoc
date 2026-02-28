@include("includes.header")
    <form action="{{ route("stripe.checkout", $reservation->id) }}" method="POST" id="PaymentForm">
        @csrf
        <button type="submit"></button>
    </form>    
    <script>
        document.addEventListener("DOMContentLoaded", (event)=>{
            setTimeout(() => {
                document.forms["PaymentForm"].submit()
            }, 1000);
        })
    </script>
@include("includes.footer")
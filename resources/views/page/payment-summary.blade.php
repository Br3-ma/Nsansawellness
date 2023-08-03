<style>
/*
  ========================================
  Reset & Basic Styles
  ========================================
*/
*,
*:after,
*:before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font: 16px 'Ubuntu', Arial, sans-serif;
}
.container,
.row {
  width: 1000px;
  margin: 0 auto;
}
.row {
  margin-bottom: 50px;
}
.row-alt {
  background: #F4FAFB;
  padding: 45px 0;
  margin-bottom: 50px;
}
.col-1,
.col-2,
.col-3 {
  display: inline-block;
  vertical-align: top;
}
.col-1 { width: 180px; }
.col-2 { width: 565px; }
.col-3 { width: 750px; }

/*
  ========================================
  Payment
  ========================================
*/
.payment {
  margin-top: 60px;
}
.payment h1 {
  font-size: 26px;
  font-weight: 300;
  line-height: 28px;
  color: #0d2b3e;
  width: 1000px;
  margin: 0 auto 40px;
}
.payment h1:before {
  content: '';
  float: left;
  width: 28px;
  height: 28px;
  margin-right: 10px;
  background: url("../uploads/sites/304/2022/06/logos.svg");  
}

/*
  ========================================
  Custom list
  ========================================
*/
.card-list {
  background: url("https://stripe.com/img/v3/pricing/payments/card-brands.svg") no-repeat;
  height: 25px;
  margin-top: 10px;
}
.card-list li {
  display: inline-block;
  text-indent: -999em;
}
.features-list {
  list-style-position: inside;
  color: #566b78;
  margin-top: 20px;
  overflow: auto;
}
.features-list li {
  float: left;
  width: 33.33%;
  margin-bottom: 15px;
}

/*
  ========================================
  Icons
  ========================================
*/
.icons {
  text-align: right;
  margin-right: 40px;
}
.icons img {
  margin-left: 5px;
  margin-top: 20px;
}
.row-alt .icons img {
  margin-top: 80px;
}

/*
  ========================================
  Info
  ========================================
*/
.info h2 {
  color: #0d2b3e;
  font-size: 19px;
  margin-bottom: 10px;
}
.info h3 {
  color: #566b78;
  font-weight: 500;
  margin: 20px 0 5px;
}
.info .description {
  width: 100%;
  padding: 5px 40px 5px 0;
  border-right: 1px solid rgba(52,21,112,.075);
}
.row-alt .info .description {
  border-right: none;
}
.info .description p {
  color: #566b78;
  line-height: 22px;
}
.info .description p a {
  color: #008cdd;
  text-decoration: none;
}
.info .description p a:hover {
  color: #003f5e;
}

/*
  ========================================
  Price
  ========================================
*/
.price {
  vertical-align: bottom;
  margin-bottom: 25px;
}
.price p {
  margin-left: 35px;
  font-size: 24px;
  font-weight: 300;
  color: #00ab1c;
}
.payment h1 + .row .price {
  margin-bottom: 55px;
}

button {
	 border: 1px solid #621ebc;
	 background: #421a68;;
	 padding: 10px 25px;
	 color: #ffffff;
	 cursor: pointer;
     float:right;
}
button:hover {
	 background: #1e48bc;
	 color: #fff;
}
</style>
<div style="width: 100%">
    <a href="{{ route('welcome') }}" style="padding:2%">
        <img width="50" src="../uploads/sites/304/2022/06/logos.svg" class="attachment-full size-full" alt="" loading="lazy" />
    </a>
</div>
<section class="payment">
    <h1>Payments</h1>
    
    <div class="row">
        <div class="col-1 icons">
          <img src="https://stripe.com/img/v3/pricing/payments/section-cards.svg" width="70" height="70" alt="cards logo">
        </div>
        <div class="col-2 info">
          <h2>Payment Summary</h2>
          <div class="description">
            <p class="py-4">
                Thank you for choosing our therapy platform and entrusting us with your emotional well-being. 
                Here's a summary of your payment details:
            </p>
            <br>
            <p>
                Package: {{ $billing->desc }}
                Billing Amount: K{{ $billing->charge_amount }}
                Thank you again for choosing Nsansawellness Online Therapy. 
                We are honored to be a part of your healing process and are 
                committed to delivering the highest level of service and support.
            </p>
            <br>
            {{-- <p>We charge a percentage-based fee each time you accept a credit or debit card payment. The price is the same for all major cards, including American Express. There’s no additional fee for international cards, failed charges, or refunds.</p> --}}
            <ul class="card-list">
              <li class="card-visa">Visa</li>
              <li class="card-masterCard">Master Card</li>
              <li class="card-dinersClub">Airtel Money</li>
              <li class="card-dinersClub">MTN Money</li>
              <li class="card-dinersClub">Zamtel Kwacha</li>
            </ul>
          </div>
        </div>
        <div class="col-1 price">
          <p>ZMW {{ $billing->charge_amount }}</p>  
        </div>
        <div style="width: 100%; justify-content:center;" class="items-center">
            <form action="{{ route('make-payment')}}" method="POST">
              @csrf
              <input type="hidden"{{ auth()->user()->id }} name="user_id" />
              <input type="hidden" value="{{ $billing->plan_id ?? 1 }}" name="package_id" />
              <input type="hidden" value="{{ $billing->charge_amount }}" name="amount" />
              <button style="float: right" type="submit">
                  Proceed to Payments
              </button>
            </form>
        </div>
    </div>
  
    {{-- <div class="row info">
      <div class="col-1 icons">
        <img src="https://stripe.com/img/v3/pricing/payments/section-disputes.svg" width="70" height="70" alt="disputes logo">
      </div>
      <div class="col-2 info">
        <h2>Disputes</h2>
        <div class="description">
          <p>Disputed payments, such as chargebacks, incur a fee. If the customer’s bank resolves the dispute in your favor, the fee is fully refunded. <a href="#" class="ico-arrow">Learn more</a></p>
        </div>
      </div>
      <div class="col-1 price">
        <p>$15.00 or $0</p>
      </div>
    </div> --}}
</section>
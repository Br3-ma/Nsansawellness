@include('layouts.head')
<style>
  
.wapper {
  
	width: 860px;
	margin: auto auto;
  margin-top: 0px;
	background: #fff;
	/* overflow: hidden; */
  box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
	border-radius: 12px;
}
.sidebar-section {
	width: 260px;
	float: left;
	/* overflow: hidden; */
	background: #009BFF;
  color: #fff;
}
.paysam {
	/* padding: 30px 20px; */
  
}
.paysam h4 {
	font-size: 16px;
	text-transform: uppercase;
	text-align: center;
	margin: 40px 0 0 0;
	border-bottom: 1px solid #C482FE;
	padding-bottom: 20px;
}
.paysam ul {margin: 0;padding: 0;border-radius: 5px;}
.paysam ul li {
	margin: 25px 0;
	border-bottom: 1px solid #C482FE;
	padding: 0px 2px;
}
.paysam ul li em {
	display: block;
	font-size: 16px;
	font-style: normal;
	margin: 0 0 10px 0;
}
.paysam ul li span {
	font-size: 17px;
	font-weight: 600;
}

.container-section{
  width: 600px;
  float:right;
  overflow:hidden;
  color:#8D8D8D;
}
.user-info {
	padding: 0 20px;
}
.user-info h1 {
	text-align: center;
	font-size: 30px;
	color: #02B0C8;
	font-weight: 900;
  font-family: sans-serif
}
.address {
	padding-bottom: 8%;
}
.address span {
	color: #828282;
	font-size: 16px;
	font-weight: 600;
	margin-right: 7px;
}
.msg {
	margin: 35px 0 25px 0;
}
.msg h2 {
	font-size: 27px;
	margin-bottom: 30px;
	color: #66AA33;
}
.msg p {
	font-size: 16px;
	line-height: 25px;
	text-align: left;
}
.msg .sender {
	margin-bottom: 35px;
}
.msg > span {
	margin: 13px 0 8px 0;
	color: #7F7F7F;
	display: block;
}
.bottom {
	color: #66AA33;
	font-size: 15px;
	border-top: 1px solid #DEDEDE;
	/* padding: 20px 0 0 0; */
}
.bottom .nlink{
	float: left;

}
.bottom .brand {
	float: right;
	color: #C2BDBD;
}
</style>
<div style="padding-top:5%; text-align:center">
    <div data-elementor-type="wp-page" data-elementor-id="6" class="elementor elementor-6">
      <section class="elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="89845c3" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
          {{-- <div class="elementor-background-overlay"></div> --}}
          {{-- <div class="elementor-container elementor-column-gap-no"> --}}
          <form action="#" method="post" style="margin-top: 5%; margin-bottom:5%">
            @csrf
            <div class="wapper">
              <section class="sidebar-section">
                <div class="paysam">
                  <h4 class="text-white">
                    @auth
                    {{ Auth::user()->fname.' '.Auth::user()->lname }}
                    @else
                      Guest User
                    @endauth
                  </h4>
                  <ul>
                    <li>
                      <em>Amount</em>
                      <span>K{{ 8.99 * 3 }} ZMW</span>
                      <br>
                      <small>K8.99 ZMW /hour</small>
                      <input type="hidden" name="total" value="">
                    </li>	
                    <li>
                      <em>Date</em>
                      <span>{{ $date = date("D M d, Y G:i"); }}</span>
                      <input type="hidden" name="date_issued" value="">
                    </li>
                    <li>
                      <em>Counselor/ Therapist</em>
                      <span>Jenna Rodrigez</span>
                      <input type="hidden" name="counselor_id" value="">
                      <input type="hidden" name="issuer" value="Nsansa Wellness">
                    </li>
                    <li>
                      <em>Invoice Number</em>
                      <span>AEZ564K458</span>
                      <input type="hidden" name="inv_num" value="">
                    </li>
                  </ul>
                </div>
              </section>
              <section class="container-section">
                <div class="user-info">
                    <h1>Payment Summary</h1>
                    <div style="padding-bottom:14%" class="address">
                      {{-- <p><span>Post-Traumatic Stress Disorder</span></p>
                      <hr> --}}
                      {{-- <p><span>To:</span>
                        @auth
                        {{ Auth::user()->fname.' '.Auth::user()->lname }}
                        @else
                          Guest User
                        @endauth
                      </p> --}}
                    </div>	
                    <div class="msg">
                      {{-- <h2>Hi, Vin!</h2> --}}
                      {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                      <span class="ej">Enjoy!</span> 
                      <p class="sender">
                        - Your Nsansa wellness Team
                      </p>
                      --}}
                      <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUYAAACaCAMAAADighEiAAAAk1BMVEX////tHCTsAADsAA7tEhzsAAXtFyD82Nn4urvtERvtFh/sAA370dP72tvtDBjsABL0gIP1lpnyZmr0hIfzdXj95ufxWFz2oKL84OH6y8z+9vb96uvwS1D+8PH95+jwXGDuNDr3rK7vREn3pqj2nZ/5wsP4trjybXH1k5b3rrDvPkTuJS3wUlfvNz30io3uLTTycnXuEMY7AAATTklEQVR4nO1d63ayOhAtAaKADZaqVZRqtd5vff+nO4RrZggQ/Gxrz2L/aZdKCJtkMplbnp4eFn2maZq7/u1u/G2sD7rGYQ783+7KH8aA2FoMl0x+uzN/Fl9Ey0DN3m93549iJbAY8sjaeX0LAkpFGjX98ts9+pP4dACLGj22w/EGzAxIo/Zvq4w//Y63MH1+9HdLEIua/nZrU53N6+xoaMN7du8pWK+8AyWHW3n0/Z94A0GBRnfXvJXnzW57JcRkBtXI6k5d87sv/ZNGiG6F+hhprEEEk9XAOx0Wi8V55u2673fqVcnNijS+NG7EI6bL0pVK/7xT185E568lETWNdljD/Tbk32GWYVNKbdtyTWJdnu/UMRlcTCPpNm1iDV7FvWiErTagcfi5NE0G9Q++drrk9H2bi7mFR2Pj4f8BFvt70dg1b6HR3yyJbmtyGOQ0vk/nCtigWc28xk2sfoJGpYEUXI4Eax4AlnMvkYOxgO+ONH9faDTevNJDNKdx+krcwlzGIIP7dA+jQ8Rb37LOPgaN/s4tyHkZzPl9+oexdlh6C0qaL9M/RGOdwrNnugqJvIOj+3QQYzoiLlcMLPPYeJXmeAAaewdSO50zOM3Fvxp6/YNGr97qNoX/R1bqTsVP/X71woJx05z7dvw2jWtNSSgKML9TE78Vv0ujv20wnxMYy/v08a7YAxpv2ExKoUhj86EYNddIIfGnw3GIYXCHxxIafR++T4UmIY3sS7GZGkGMaCyZhrvmQ5HDXqh18smffG5nC42ZhJi6dhhd7uE99def8+VVs1xGj0vvso65hDRqzt4PpiFK312w3s2X58XivPR23WnZr1Ro9EcFy4oilCwHnd2BiPYRalsuIf3KDUowXH8ODhUu1ve3WWS1okKT0ZYA0ag5JIZUr5iuloS4Flew4iaWKzmTCjQGh1smdASrVukZv55DPVByqet8SUl6Xq/68+WRE2+XvqXu3HUKWgV1IxpNyc34oxfH4/SLmahrtuP2Zd2qp3F6ZNrNcKpJ7JZwGIGRTfEKj/OXDjK58uyvCMGWoKi9bSWNBTv4jkgf3JVJ/Foag4WsS6qo1OdXC1LKYXx1wbb9Dq2FMhr31zKiop0untTZt0iIjA8lzYQ/HRUGZB2NwfVfWKzabPlHPGMkHcYO1E4dje+zstXQPj9V0giVlG7VVoMdsZmzjsbZP8zoEO5rKY0TlXWLIKLqaFyx0reeaNqlNAKrTLdaNbGwY7eGxkHJTVURyyM5LBUlCtmcamgcVDw9kSo88hv16hQ8hgxY1TRia3NjGBV2nlWp8BGAVM9KGoNZxUt3EwvohwKNgVYvbuCtK2kMlAZMBMpMnVLdQfe3Kmj0r3nr1GKhAhdq3y4WSSbobxWN71pRAFGmm8Q0XcbotIZGQeHx6iUZZUBBqqTxS1VhNAjdbsZBMF6d4SVVk/rpJbFdGg65eq8f616nt96dkGynmiqNZywWbZdcB2/dTmd9GXjpYMM0Wqbp6IyJ6jeW2rZJdIK1Hxg+VEXjs9qU5s7AbiZyPbj1r4pVitzO1HVOK1HZeF7CN2GKOnYFjV388GTxItkJIRpdb9P9eOkP3oQ1A4W4OIf91A/W2DYDhmMVjSMlXcehF9BbMCOcSuPE1qWOdilsr+bgxYOdUAWNF8i+cZXvyyGNsm0Weh+Z8jqB4Wym+GgVNI5VBqNLXtAuKhD7aUo2IsIddO1TsrUKoKNCDGKsoLEPyKd2ibHho9ZQdgXyXVhL4GS3RTNgBY2DekHL3EuRBvF5Ks3ppYCMiDshZRpLDYm1ZlsYAOGKLk444MV9TzmN/rFumbaJJwta6An9IDc5TGCnnI/8G2UaSwMXamkEkRkwgDJwy64tp7FXN6edhXzD7Oc3s2+zf0NxIi5T6jSWTYO6qIkx+N7cgy9fRR7tQ/5FOY2raleqUbQbpDhkwoX1K+kqgw/IEpUmdRrL/EB1NH6Cxzbhlz3Alp6P1HIaL5Wi0VyW+6tOmcLQLEItgw86ZZzyb9RpLDMt1dF4FheYwjC4ioJOSIQop3FQoe4Ylc7TZdYTu9TqXokpIOtHaYSWuIKicRJVSief8eU09stHo7mssvDnmzyRgFr4Ob7ArX+URmjVLQTjLEvGajmNb2Wy0cLWK4Q8JhYJ6NILOqvX+eFoJTBc+AJ/lMYtaMVEXooNWKqt3MzTeKWmZFYTDZfvAlTUHb97snnErl2qXv0ojQvQDXrdTDKs30ZwZAl6SIX6fZBZi3RaO8KyKcnqo/Omr25tRMu30ogm1hAtCNQkOXTUU3rNhkkFjXivr/Gtn2TXgpCrjfUB+S9MwYb0kzR21KwxCXLrRJVp4hW2SXX3VWHlzfpZG1Hsz5Q6/ZM0dlVMyflNpvLrkNL6SbIYecqI9qKkvmSyoFQDThAs1Pw8d6ZRL23hCSvftTRmTtlqJ8K4fySO6zomufYVU2b26YPWDUb/qugt+0kaL40iG/IdZ51n0O+tdrvVpqNsYsjGr1uTR3ZS9Tn+JI0VyrKMxkytVAuFUscl7aVZEzl4kUohw3UcHKAvusUQjeI9foPGbK97ZxrH6aSwjzU/LK4ulkms0+XjY3eEmtZv0khZCL4nYDLkMUR3pnGZ6l1Ojb32hHfszJ3vkyUsMMB4vDONlSs1otG4fg0GX9587m3DfzC+cgvepjGNw9X2NL/IWXpLn7IuQLSwRTJHwt4IGpd+kka4xNCjashqUxqHnukww3KJJ7lDNqX1Kr8qB3ZQkAp3ZQWNd9cbX8o2zTVoSOPeTDvrXguLt79Idkus1uiNprQOt41wrP4kjTA05bto9ISncApRTl7yKm2tbi6gOU3RK3n+NRrLX2A1GtE4F7sguiIi7JIuUKdWNMBnKXizh99IY7VLawzWcXVXUhMaT/AeCziEPjIW6/M3kWjEka7TX6MRukPpWXXX0YBGGFaCN3tZ8JmK/+UETU4u+voHacTOEGDe1uj9V+oPpKPAjq6TdqhS8gGMkin4Gm6i8fUWGgtRAagV1WgFZfV7iFkE0yENNaBqvkBIY8G8+4M0Yi8xjJmoDkESoEzjHIkzsE6nrdgKcpFjBGnEa/77N9K4r6YRuchV/eyqNMK3pBHQfjrfDaa4mYRyrBAEqUqjcwONUIoV6/jAiYKldhlQ5ZNSWQAXBchiaiVnR9XSD1DhoVf0tarCcwuNcNwU4y9fgDqiWrwLBpuVXgW7D1j0U53cOSkbJVE8K1Z4vnNSw3FjFXatUPVX1Rxhv0ody2DLDuTiOA1TblKlw0chr2hMfOcSA1ugtPADqPKYZYtMD6ylcP6UxhhrglYKWNwkXkfD/Ci5VAroVddcKFP9b6TRRxOhMP9QNpx8gj7PCdTs4MvRZNeEQ05o2hRndD8JiNbPzSyVaMWyoUVq/I00wmimcEtbkETQ2ikLGO54hKGkexgMWmL6F55a3Lz0FrE8pqTOMFbAGVm4NWGOBHA9u+8uBltm2RL7Owv7jFfAdLA6x2YucAu0vZUXX8h1Vqplbfq7JHPS1ZrH3+FYgvBNTPjzBM+fI5R/at2XRpyuYZD+GlYUwMU2XesSufSCYWfTP5A09weY0XAilnn97BR8ermCYuZenGP8oU3kic81mBW8CIQuDgvNxCEeN0bblvuDFziohhF2PAuiveAnoq55PBwOR5eYTLhYVA9x1V2N6oRdPchMpmxl1rFOmilqLm4LBYXBwcmtbdwZ/qFiCP1AlUY8aeM7k+pfUNsuBGuBFLS+xMNNUURyZs2kcTZt92TGY4bdXmxHMR8RpvBX0PilSuPTVRZ8RUQR+arWN3EV92WXYGtBptrr/aDzYiVRYMwZ/EOZkheVvjINbKwqXFpbZRrHuiQIENCoxiOYJ7LIsYK1IE+9Yk5aMI+R7b/VabzU9tXGnrMKGj0gbCuj2SaSPF9IY9i3unQW6mhQpZRQj2nEZrJQ8Jvbfw6xWBXrakASD1juVtA4V6fxqWcUoiMQjU/d4k8AdLsgzvoF6gsWoj34SbgMVRd4UcTzsrzaBCMLieJ7HxqfhjhRthgZPB2V9812yEUizro6EhcFE+BT10qqsFLLJdfdvUo3dc/S+iLMtLayXRjURUBpFCQb64rerkc6KCtLJD85SPtmu+RQUq7Pv1im+HokKXfB7hyF7h7nu7vWAF5vecWg7C1SaunE8fYlsZRLIYiYLMWHmYjfEAXX6JiXUTJdZoSwiNQlvfa4pihmz7uELEpCRiIE+1H4OCzUjqhtMLlHxZ/et4BY2uz6ZXQ1nAiutpi/Vb2m4XvShWCIBpzf63XGEXoTxWBMf7K5bEez2Wz+VrKFCDaD5VEnUeUBk17nL+taBvz1bjs7LBaHk9fIXHMXvD9HGH/He/pH+ONOb71Z955vS5Zq0aJFixYtWrRo0aJFixYtWrRo0aJFixYtWrRo0aJFixYtWrRo0aJFixZqGPbWYxipNR1PxmWxW9P39/fKmLNgOH4vu9h/v/vZpL+M7iCKQAwuZ1481jhlgYDjy8EKP7GWuyIZ3e3Zdl12XHofKLTxIzktZX86msS1l1tJeGbXW7hhy87x9JkzOf6UxFKOX9UqRP86usTl51u8pYc1GuQa0epv009sFx8WsKYkTpGiNnOIJ8bveyE5/tPTRCNx2qTNiIGC77uMJBG91NCzOhk94hSrbwdMl8fePhxemWbN37eEP1Ty5DxR9PnqxnHLcTQ2yOdMwvz5aahxcHie6BxoVDM/nlbJL2Ky4JGZX0kGQBJ/nNLE08QdPMtfnPDDeyQIfDt4DotFmEbN4+x0jR+R9N946D8z6eIYJ1+KGWBfPHae6uR4Ph9JRHZeHW7IA92tmckzBEzt6MbHQIq5CF6UrBcOyKMRX+zGWby88ISDw9wdScWrx0SSCmS4m4DHSsdVbnnxapsMelM/6M2jjIP8fIwodYdpnzymOXi+RPk0JJVgcUUsm+cvrsbTYLiJzt41ciqiPCaL9HvTYNq56PxuTvQSeIYaRQU7ObXNcux/DTGN1jmdT2n1TCvLbo9OZsmK+kT53Po2C3OfLjkV6Zl2ab1DMxtXUVJZNhyjjEd3li5LflTeKi7ywtNeUbrA0tYou+fDfh8iGukxW4yHdiL4cjnFk/Czc4t47i44aNKPPkkSGxMaSb6++lyAZslHSwNdPdDT9FNeoAOWF+Tp1nrVeXQPhIhGMf8zToYWS0rxCtxpdk6UmMtAykWUrsXi9xDTWDj1Ks3D5sRQCq7mxJpR1jg/vQ4cBswHcl2R6EdBtMSIpeKiWQuqtfCZmNLIK7I7qOwAbyIRYTGNTFQ0OXXpYOXpWwRqgvwlxIWzeKa4K2T28do1lWdMPhI4B6CaWZTaCUo0vec0Rien4BN8eN5tUvciohE+Oz//KPmEF6uh+ATfmZ1+zae/MNC5TK4/y+FBENEIPuFMmT30SUIjH6rGDDXBlcVkkY1oRIVeFjTliV9t46sHTLPj4oy8ClS+MPNaBzeeo/YLCGlEegYpVK/JaeQFQ4pJjLxcXPwqYhoL3yY0RsccWJtgmiOY8AXMimicgnfETylWKp34EAhpRMOLFHTenMadK5YKSRHpKtHiwGnENSBDGhPhGytXJkjMjBT+ZGWJRGc6D86htrP458f7KUhpRAV5IY3FupC8nHz8+Fz9xseycxpjReZUlvqejDpxNYq0nZpTCB4IUhpRfYs6GvluI/50SouTPqcRHcKUpPVSm6X5/LyyUpKUHqk/Nx3U+SuQ0/iKP6mk8S0bjVOtisZoNIY79Rj24WpHf8+j7MRqM1X0eVEbhZOrHgbNaMzHnQiuYccFhapp5Pp0pSbos1RljbSdP2HbidGMRq4iOgVL6jybgNU08pW6uECJSHVF36ANCs8/AJrRyPcc7As1wfXGpGZqNY1cbyzWXhWRzuWVdNQ/MJrRGCmV+AiGdW5U4DTiAt45jXwXY1SPsUQFDaVooT7sQ6MhjfwxcRlFLvKSetKcRgdZCHMaY2MDrkvRFZ0Q62hjyY9X+SOGxgQNadyTQh3hyMLjxJaYiEZUPFWgcVKUCc9HWAyUF7G0WMEQ9OiY2Y1ojE4qcEUmYntj8km1bIzNYsA188wMaID8TMr3lRalfUwsm9EYn7onVIMdHiLzdqI/19EYjVyhan7X4gq3OH2nyU5H/yOGxgRNaXzyuH3BOcQTcXhhkS8mJaKOxvgIFjKLrx5v+Y7aOoOfxyWlrLpzOh8MjWl8GvFpZxNyHi1p4hnMpGEtjbFHzDDJbOtdo4JZNoVrTlz77M8YGhPMDCjqogKRLiwvR6AW48WF12wj3hQzQdhFfmq0xITKuVjs8zN22dos9vm7Lq72xz2wxp8xNCb4IAQdn7AlOrLzeeEnoMzkIiu8RnWyhcU/TRNpNJ/h1WI8xHCelp3klWoHhQWZK/OS0tQPjt4G+QT8/Qt+iM0LDiDxEmvhdYc2vuuPwk54j69+3l3jq4/4ag4i8TT8fzGerNeqR+FI0Jmse1KuJkRyklGLpogMjf+nkL1fgWgBb3EzuNHN/Adh0YKDl3otnIvWoilepV6KFs3ALR9lR7y0UAY3fJSeUtRCFV9Mo3ar7fwrLo5m/i1D40NiumSj79oH/gd4pFD7h82caQAAAABJRU5ErkJggg==">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                          <img src="https://citinewsroom.com/wp-content/uploads/2020/03/MTN-Momo-e1584721116128.jpeg">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                          <img src="data:image/png;base64,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">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/2560px-MasterCard_Logo.svg.png">
                        </div>
                      </div>
                      <div style="margin-bottom:0px; margin-top:15%" class="col-lg-12">
                        <a class="btn btn-lg" href="{{ route('patient') }}">Continue to Trial</a>
                        
                        <button disabled title="Under Constraction" class="btn btn-sm btn-warning" type="submit">Process to Payments</button>
                      </div>
                    </div>
                    <br>
                    <div class="bottom">
                      <p class="nlink">www.nsansawellness.com/help</p>
                      <p class="brand">Nsansa wellness Group</p>
                    </div>
                  </div>
              </section>
            
            </div>
          </form>
          {{-- </div> --}}
      </section>
    </div>
</div>
@include('layouts.footer')
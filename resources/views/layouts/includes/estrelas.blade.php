@switch($avaliacao->nota)
@case (1)
<a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
<a href="#" data-rating-value="2" data-rating-text="2"></a>
<a href="#" data-rating-value="3" data-rating-text="3"></a>
<a href="#" data-rating-value="4" data-rating-text="4"></a>
<a href="#" data-rating-value="5" data-rating-text="5"></a>
<div class="br-current-rating">1</div>
@break
@case (2)
<a href="#" data-rating-value="1" data-rating-text="1" class="br-selected"></a>
<a href="#" data-rating-value="2" data-rating-text="2" class="br-selected br-current"></a>
<a href="#" data-rating-value="3" data-rating-text="3"></a>
<a href="#" data-rating-value="4" data-rating-text="4"></a>
<a href="#" data-rating-value="5" data-rating-text="5"></a>
<div class="br-current-rating">2</div>
@break
@case (3)
<a href="#" data-rating-value="1" data-rating-text="1" class="br-selected"></a>
<a href="#" data-rating-value="2" data-rating-text="2" class="br-selected"></a>
<a href="#" data-rating-value="3" data-rating-text="3" class="br-selected br-current"></a>
<a href="#" data-rating-value="4" data-rating-text="4"></a>
<a href="#" data-rating-value="5" data-rating-text="5"></a>
<div class="br-current-rating">3</div>
@break
@case (4)
<a href="#" data-rating-value="1" data-rating-text="1" class="br-selected"></a>
<a href="#" data-rating-value="2" data-rating-text="2" class="br-selected"></a>
<a href="#" data-rating-value="3" data-rating-text="3" class="br-selected"></a>
<a href="#" data-rating-value="4" data-rating-text="4" class="br-selected br-current"></a>
<a href="#" data-rating-value="5" data-rating-text="5"></a>
<div class="br-current-rating">4</div>
@break
@case (5)
<a href="#" data-rating-value="1" data-rating-text="1" class="br-selected"></a>
<a href="#" data-rating-value="2" data-rating-text="2" class="br-selected"></a>
<a href="#" data-rating-value="3" data-rating-text="3" class="br-selected"></a>
<a href="#" data-rating-value="4" data-rating-text="4" class="br-selected"></a>
<a href="#" data-rating-value="5" data-rating-text="5" class="br-selected br-current"></a>
<div class="br-current-rating">5</div>
@break
@endswitch
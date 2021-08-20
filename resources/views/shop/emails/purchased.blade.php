<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase Successful</title>
</head>
<body>
    <h1>Purchased successfully...!</h1>
<h2>Hello {{$user}} ,Thank you for purchasing from us</h2>
    <p>Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Veritatis fuga quis
        repellendus ipsam atque nesciunt laudantium
        officiis amet facere rem soluta, molestiae
        accusantium ad voluptatibus doloremque odit est,
        sit delectus.<br>
        Your order details:<hr>

        @foreach (Cart::content() as $pdt)
        <tr class="cart_item">

            <td class="product-remove">
                <a href="{{ route('cart.delete',$pdt->rowId)}}" class="product-del remove" title="Remove this item">
                    <i class="seoicon-delete-bold"></i>
                </a>
            </td>

            <td style="width:50%" class="product-thumbnail">

                <div class="cart-product__item">
                    <a href="#">
                        <img src="{{asset('storage/'.$pdt->model->display_image)}}" width="70" height="70" alt="product" class="size-shop_thumbnail ">
                    </a>
                    <div  style="width:50%" class="cart-product-content">
                        <span class="cart-product-title"><h6>{{ $pdt->name}}</h6></span>
                    </div>
                </div>
            </td>

            <td class="product-price">
                <span class="price amount"><b>{{ $pdt->price}}</b></span>
            </td>

            <td class="product-quantity">

                <div class="quantity">
                    <a href="{{ route('cart.reduce',[$pdt->rowId,$pdt->qty])}}" class="quantity-minus">-</a>
                    <input title="Qty" class="email input-text qty text" type="text" value="{{ $pdt->qty }}" placeholder="1" readonly>
                    <a href="{{ route('cart.incr', [$pdt->rowId,$pdt->qty])}}" class="quantity-plus">+</a>
                </div>

            </td>

            <td class="product-subtotal">
                <h5 class="total amount">${{ $pdt->total }}</h5>
            </td>

        </tr>

        @endforeach

    </p>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        table, th, td {
          border: 1px solid black;
        }
        th, td {
            padding: 15px;
            font-size:25px;
        }
        th {
            text-align: left;
            font-size:25px;
            
        }
        p{
            font-size: 20px;
        }
        </style>
</head>
<body class="text-secondary">
    <h2>Hello, dear {{$name}}</h2>
    <p>Your order has been accepted and is ready for processing.  </p>
    <p>You will receive an email when your order is sent. </p>
    <br>
    <br>
    <br>
    <p>**********</p>
    <h2 style="text-align: center;">Here you can see the content of your order: </h2>
    <p>Name: <span style="font-weight:bold;">{{$name}}</span></p>
    <p>Phone number: <span style="font-weight:bold;">{{$phone}}</span></p>
    @auth
        <p>Addres for delivery: <span style="font-weight:bold;">{{$address->zip_code}} , {{$address->town}} , {{$address->address}}</span>  
    @endauth
    @guest
        <p>Addres for delivery: <span style="font-weight:bold;">{{$address->guest_address}} </span> 
    @endguest
    
    </p>
    <br>
    <br>
    <div>
        <table style="width:50%">
            <thead>
                <tr>
                    <th >Product</th>
                    <th >Qty</th>
                    <th >Price</th>
                    <th >Total</th>
                    
                </tr>
            </thead>
            <tbody>
                
                    @foreach($cart as $product)
                        <tr>
                            <td>                                                       
                                <h6>{{$product['title']}} </h6>
                            </td>
                            <td >{{$product['qty']}}</td>
                            <td >$ {{$product['price']}}</td>
                            <td > ${{ $product['price'] * $product['qty'] }}</td>
                        </tr>
                    @endforeach
                
                        <tr >
                            <td ></td>
                            <td></td>
                            <td ><strong>Total:</strong></td>
                            <td ><strong>$ {{ $order->total_sum}}</strong>
                            </td>   
                        </tr>                        
                                              
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
    <p>**********</p>
</body>
</html>
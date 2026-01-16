<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>
</head>
<body>
<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Price: ₱{{ $product->price }}</p>

<hr>
<h3>Reviews</h3>
@if($product->reviews->count() > 0)
    @foreach($product->reviews as $review)
        <div style="border:1px solid #ddd; padding:5px; margin-bottom:5px;">
            <strong>{{ $review->user_name }}</strong> ({{ $review->rating }} stars)
            <p>{{ $review->comment }}</p>
        </div>
    @endforeach
@else
    <p>No reviews yet.</p>
@endif

<hr>
<h3>Add Review</h3>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form action="{{ route('reviews.store', $product->id) }}" method="POST">
    @csrf
    <label>Your Name:</label><br>
    <input type="text" name="user_name" required><br><br>

    <label>Rating (1-5):</label><br>
    <input type="number" name="rating" min="1" max="5" required><br><br>

    <label>Comment:</label><br>
    <textarea name="comment"></textarea><br><br>

    <button type="submit">Submit Review</button>
</form>

<br>
<a href="{{ route('products.index') }}">Back to Products</a>

</body>
</html>
<?php
namespace App\Observers;

use App\Models\Comment;
use App\Models\Product;

class CommentObserver
{
    public function saved(Comment $comment)
    {
        $this->updateProductRating($comment->product_id);
    }

    public function deleted(Comment $comment)
    {
        $this->updateProductRating($comment->product_id);
    }

    protected function updateProductRating($productId)
    {
        $product = Product::find($productId);
        $averageRating = $product->comments()->avg('rating') ?? 0;
        $product->rating = $averageRating;
        $product->save();
    }

}
?>
<?
class ProductPhotoCollectionForm extends sfForm
{
  public function configure()
  {
    if (!$product = $this->getOption('product'))
    {
      throw new InvalidArgumentException('You must provide a product object.');
    }
 
    for ($i = 0; $i < $this->getOption('size', 2); $i++)
    {
      $productPhoto = new ProductPhoto();
      $productPhoto->Product = $product;
 
      $form = new ProductPhotoForm($productPhoto);
 
      $this->embedForm($i, $form);
    }
  }
}
?>

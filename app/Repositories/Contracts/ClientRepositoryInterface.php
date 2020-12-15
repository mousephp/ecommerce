<?php 
namespace App\Repositories\Contracts;
use App\Repositories\Contracts\RepositoryInterface;

interface ClientRepositoryInterface 
{
	public function limitTag();
	public function detailSlide($id);
	public function categoryProdType($id);
	public function productType($id);

	public function categoryFeatured($id);
	public function categoryNews($id);
	public function categoryTags($id);
	public function getCommentProduct($id);
	public function countCommentProduct($id);

	public function getMobile();
	public function getLaptop();
	public function getAccessories();
	public function getClock();
	public function search($str);

}



<?php

namespace App\Enums;

enum ProductType :string
{
   case EBOOK = 'ebook'; 
   case TEMPLATE = 'template'; 
   case ASSET = 'asset'; 
}

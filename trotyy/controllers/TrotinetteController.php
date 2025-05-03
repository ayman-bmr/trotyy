<?php
namespace TROTYY\Controllers;

require_once __DIR__ . '/../Models/Trotinette.php';

use TROTYY\Models\Trotinette;

class TrotinetteController {
    private $trotinetteModel;

    public function __construct() {
        $this->trotinetteModel = new Trotinette();
    }

    /**
     * Get products for sale with optional filtering
     * @param int $limit Number of products to return (0 for all)
     * @param int $category Category filter (0 for all)
     * @return array List of products
     */
    public function getProductsForSale(int $limit = 0, int $category = 0): array {
        try {
            $products = $this->trotinetteModel->lister(2);
            
            // Apply category filter if specified
            if ($category > 0) {
                $products = array_filter($products, function($product) use ($category) {
                    return $product['Categorie'] == $category;
                });
            }
            
            // Apply limit if specified
            if ($limit > 0) {
                $products = array_slice($products, 0, $limit);
            }
            
            return $products;
        } catch (\Exception $e) {
            error_log("Error getting products: " . $e->getMessage());
            return [];
        }
    }
    public function getProductsForRent(int $limit = 0, int $category = 0): array {
        try {
            $products = $this->trotinetteModel->lister(1);
            
            // Apply category filter if specified
            if ($category > 0) {
                $products = array_filter($products, function($product) use ($category) {
                    return $product['Categorie'] == $category;
                });
            }
            
            // Apply limit if specified
            if ($limit > 0) {
                $products = array_slice($products, 0, $limit);
            }
            
            return $products;
        } catch (\Exception $e) {
            error_log("Error getting products: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Get product details by ID
     * @param int $id Product ID
     * @return array Product details
     * @throws \Exception If product not found
     */
    public function getProductDetails(int $id): array {
        return $this->getSingleTrotinette($id);
    }

    /**
     * Get a single trotinette by ID
     * @param int $id Product ID
     * @return array Product data
     * @throws \Exception If product not found
     */
    private function getSingleTrotinette(int $id): array {
        $trottinettes = $this->trotinetteModel->lister();
        
        foreach ($trottinettes as $trott) {
            if ($trott['IDTrotinette'] == $id) {
                return $trott;
            }
        }
        
        throw new \Exception("Trottinette not found with ID: $id");
    }

    /**
     * Get featured products
     * @param int $limit Number of products to return
     * @return array Featured products
     */
    public function getFeaturedProducts(int $limit = 4): array {
        try {
            $allProducts = $this->trotinetteModel->lister();
            shuffle($allProducts); // Randomize for demo
            return array_slice($allProducts, 0, $limit);
        } catch (\Exception $e) {
            error_log("Error getting featured products: " . $e->getMessage());
            return [];
        }
    }
}
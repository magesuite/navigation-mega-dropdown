<?php

$objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();

$category = $objectManager->create('Magento\Catalog\Model\Category');
$category->isObjectNew(true);
$category->setId(221)
    ->setName('First category')
    ->setParentId(2)
    ->setPath('1/2/221')
    ->setLevel(2)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(100)
    ->save()
    ->reindex();

$category = $objectManager->create('Magento\Catalog\Model\Category');
$category->isObjectNew(true);
$category->setId(2221)
    ->setName('First First subcategory')
    ->setParentId(221)
    ->setPath('1/2/221/2221')
    ->setLevel(3)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(101)
    ->save()
    ->reindex();

$category = $objectManager->create('Magento\Catalog\Model\Category');
$category->isObjectNew(true);
$category->setId(2222)
    ->setName('First Second subcategory')
    ->setParentId(221)
    ->setPath('1/2/221/2222')
    ->setLevel(3)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(101)
    ->save()
    ->reindex();

$category = $objectManager->create('Magento\Catalog\Model\Category');
$category->isObjectNew(true);
$category->setId(222)
    ->setName('Second category')
    ->setParentId(2)
    ->setPath('1/2/222')
    ->setLevel(2)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(101)
    ->save()
    ->reindex();

$category = $objectManager->create('Magento\Catalog\Model\Category');
$category->isObjectNew(true);
$category->setId(2223)
    ->setName('Second First subcategory')
    ->setParentId(222)
    ->setPath('1/2/222/2223')
    ->setLevel(2)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(100)
    ->save()
    ->reindex();

$category = $objectManager->create('Magento\Catalog\Model\Category');
$category->isObjectNew(true);
$category->setId(2224)
    ->setName('Second Second subcategory')
    ->setParentId(222)
    ->setPath('1/2/222/2224')
    ->setLevel(2)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(101)
    ->save()
    ->reindex();

$category = $objectManager->create('Magento\Catalog\Model\Category');
$category->isObjectNew(true);
$category->setId(223)
    ->setName('Third category')
    ->setParentId(2)
    ->setPath('1/2/223')
    ->setLevel(2)
    ->setAvailableSortBy('name')
    ->setDefaultSortBy('name')
    ->setIsActive(true)
    ->setPosition(102)
    ->setIncludeInMainBar(1)
    ->save()
    ->reindex();

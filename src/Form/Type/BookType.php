<?php

declare(strict_types=1);

namespace Guiziweb\SyliusTestPlugin\Form\Type;

use Guiziweb\SyliusTestPlugin\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'guiziweb_sylius_test.form.book.title',
            ])
            ->add('author', TextType::class, [
                'label' => 'guiziweb_sylius_test.form.book.author',
            ])
            ->add('isbn', TextType::class, [
                'label' => 'guiziweb_sylius_test.form.book.isbn',
            ])
            ->add('price', IntegerType::class, [
                'label' => 'guiziweb_sylius_test.form.book.price',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'guiziweb_sylius_test_book';
    }
}

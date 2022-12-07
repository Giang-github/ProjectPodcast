<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function save(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Post[] Returns an array of Post objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Post
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function sortBlogByIdDesc()
{
    //SQL: SELECT * FROM movie ORDER BY id DESC
    return $this->createQueryBuilder('post')
        ->orderBy('post.id', 'DESC')
        ->getQuery()
        ->getResult();
}

public function sortBlogNameAsc()
{
    return $this->createQueryBuilder('post')
        ->orderBy('post.name', 'ASC')
        ->getQuery()
        ->getResult();
}

public function sortpostNameDesc()
{
    return $this->createQueryBuilder('post')
        ->orderBy('post.name', 'DESC')
        ->getQuery()
        ->getResult();
}

public function searchPost($title) 
{
    return $this->createQueryBuilder('post')
        ->andWhere('post.title LIKE :n')
        ->setParameter('n', '%' . $title . '%')
        ->getQuery()
        ->getResult()
    ;
}
}

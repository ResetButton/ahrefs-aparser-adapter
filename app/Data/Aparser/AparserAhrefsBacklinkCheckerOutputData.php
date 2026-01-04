<?php

namespace App\Data\Aparser;

use App\Support\AparserAhrefsBacklinkCheckerBacklinks\AparserAhrefsBacklinkCheckerBacklinksCollection;
use App\Support\AparserAhrefsBacklinkCheckerBacklinks\AparserAhrefsBacklinkCheckerBacklinksData;
use InvalidArgumentException;

readonly class AparserAhrefsBacklinkCheckerOutputData implements AparserAhrefsOutputData
{
    /**
     * @param AparserAhrefsBacklinkCheckerBacklinksData[] $topBacklinks
     */
    public function __construct(
        public float $domainRating = 0,
        public int   $refDomains = 0,
        public int   $refDomainsDoFollowPersentage = 0,
        public int   $backlinks = 0,
        public int   $backlinksDoFollowPersentage = 0,
        public AparserAhrefsBacklinkCheckerBacklinksCollection $topBacklinks
    ){}

    public static function fromAparserResult(array $data): static
    {
        $topBacklinks = new AparserAhrefsBacklinkCheckerBacklinksCollection();
        $dataTopBacklinks = data_get($data, 'topbacklinks', []);
        foreach ($dataTopBacklinks as $dataTopBacklink) {
            $topBacklinks->push(AparserAhrefsBacklinkCheckerBacklinksData::fromArray($dataTopBacklink));
        }

        return new static(
            domainRating: data_get($data, 'domain_rating'),
            refDomains: data_get($data, 'domains_count'),
            refDomainsDoFollowPersentage: data_get($data, 'domains_dofollow_persentage'),
            backlinks: data_get($data, 'backlink_count'),
            backlinksDoFollowPersentage: data_get($data, 'backlink_dofollow_persentage'),
            topBacklinks: $topBacklinks,
        );
    }
}

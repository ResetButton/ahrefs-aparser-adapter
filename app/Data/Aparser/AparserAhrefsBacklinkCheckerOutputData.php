<?php

namespace App\Data\Aparser;

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
        public array $topBacklinks = []
    ){
        foreach ($topBacklinks as $topBacklink) {
            if (!$topBacklink instanceof AparserAhrefsBacklinkCheckerBacklinksData) {
                throw new InvalidArgumentException();
            }
        }
    }

    public static function fromAparserResult(array $data): static
    {
        $topBacklinks = [];
        $dataTopBacklinks = data_get($data, 'topbacklinks', []);
        foreach ($dataTopBacklinks as $dataTopBacklink) {
            $topBacklinks[] = AparserAhrefsBacklinkCheckerBacklinksData::fromArray($dataTopBacklink);
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

<?php
require_once('database.php');
require_once('activityPDO.php');
require_once('situationPDO.php');

require_once('model/offer.php');

class OfferPDO
{
    private array $data = array();

    // Return 1 offer from database
    public function read(int $id_offer): Offer
    {
        $stmt = DBConnection::getInstance()->prepare('SELECT * FROM offer WHERE id_offer = ?;');
        $stmt->execute([$id_offer]);
        $offer = null;
        if (array_key_exists($id_offer, $this->data)) {
            $offer = $this->data[$id_offer];
        } else {
            $offer = $this->returnOffers($stmt->fetchAll())[0];
        }
        return $offer;
    }

    // Return all offers from database
    public function readAll(Activity $activity, Situation $situation): array
    {
        $MySQLQuery = 'SELECT * FROM offer 
        WHERE id_activity = ? AND id_situation = ? AND active = 1;';
        $stmt = DBConnection::getInstance()->prepare($MySQLQuery);
        $stmt->execute([$activity->getIdActivity(), $situation->getIdSituation()]);
        return $this->returnOffers($stmt->fetchAll());
    }

    // TODO Add new offer to database
    public function create(): void
    {
    }

    // TODO Update existing offer
    public function update(): void
    {
    }

    // Return all offers in $rows and update $data
    private function returnOffers(array $rows): array
    {
        $offers = [];
        foreach ($rows as $row) {
            $id_offer = $row['id_offer'];
            $activityPDO = new ActivityPDO();
            $activity = $activityPDO->read($row["id_activity"]);
            $situationPDO = new SituationPDO();
            $situation = $situationPDO->getSituation($row["id_situation"]);
            $nb_entries = $row['nb_entries'];
            $nb_people = $row['nb_people'];
            $validity = $row['validity'];
            $price = $row['price'];
            $active = $row['active'];
            $offer = new Offer(
                $activity,
                $situation,
                $nb_entries,
                $nb_people,
                $validity,
                $price,
                $active,
                $id_offer
            );
            $offers[] = $offer;
            $this->data[$id_offer] = $offer;
        }
        return $offers;
    }
}

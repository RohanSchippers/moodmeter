<?php
namespace App\Models;

use CodeIgniter\Model;

class MoodsModel extends Model
{
    protected $table = 'moodmeter';

    protected $allowedFields = ['naam', 'mood','datum', 'opmerking'];
    
    public function getMoods($slug = false)
    {
     if ($slug === false) {
        return $this->findAll();
     }

     return $this->where(['mood' => $slug])->first();
    }

    function getMyMood()
    {
        $user = auth()->user();

        return $this->where(['naam' => $user->id])->find();
    }

    public function save_note($opmerking) {
        $data = [
            'opmerking' => $opmerking,
        ];

        try{
            $this->insert($data);
            return true;
        }
        catch(\Exception $e)
        {
            log_message('error', 'Error met het uploaden van de opmerking: ' . $e->getMessage());
            return false;
        }
    }
    
        // $month = date('m');
        // $user = auth()->user()->id;
        // $db = db_connect();
        // $sql = '';
        // $selection - $db->query($sql, [$user, $month]);

        // return $selection->getResult();
}
?>


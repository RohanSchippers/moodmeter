<?php
namespace App\Controllers;
use App\Models\MoodsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MoodsController extends BaseController
{
        

    public function index()
    {
        $model = model(MoodsModel::class);

        $data = [
            'moods'  => $model->getMoods(),
            'naam' => 'Nieuwe moods',
        ];
        
        return view('templates/header', $data)
        . view('moods/index')
        . view('templates/footer');
    }

    // public function view($slug = null)
    // {

    //     $model = model(MoodsModel::class);

    //     $data['moods'] = $model->getMoods($slug);

    //     if (empty($data['moods'])) {
    //         throw new PageNotFoundException('Cannot find the mood: ' . $slug);
    //     }
        

    //     $data['title'] = $data['moods']['title'];

    //     return view('templates/header', $data)
    //         . view('moods/view')
    //         . view('templates/footer');
    // }

    public function create()
    {
        
        helper('form');
       

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Moodmeter'])
                . view('moods/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['naam', 'mood', 'aantekening']);
        $model = model(MoodsModel::class);
        $naam = auth()->naam();

        $model->save([
            'mood' => $post['mood'],
            'opmerking' => $post['aantekening'],
        ]);
        // Checks whether the submitted data passed the validation rules.
        // if (! $this->validateData($post, [
        //     'naam' => 'required|max_length[255]|min_length[3]',
        // ])) {
        //     // The validation fails, so returns the form.
        //     return view('templates/header', ['title' => ''])
        //         . view('moods/create')
        //         . view('templates/footer');
        // }

        
        return view('templates/header', ['title' => 'What\'s your mood today?'])
                .view ('moods/succes')
                .view('templates/footer');

        return view('templates/header', ['title' => 'Maakt een nieuwe moodmeter aan'])
            . view('moods/index')
            . view('templates/footer');
    }

    public function save_note(){
        $opmerking = $this->request->getPost('aantekening');
        $model = new MoodsModel();
        $naam = auth()->naam();
        $data = [
            'opmerking' => $opmerking,
        ];
        $model->insert($data);
        $model->save_note($opmerking, $naam->id);

        return redirect()->to('');
    }
}
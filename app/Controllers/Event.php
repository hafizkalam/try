<?php

namespace App\Controllers;

class Event extends BaseController
{
    public function index()
    {

        $builder = $this->db->table('event');
        $query   = $builder->get()->getResult();
        $data['event'] = $query;

        return view('schedule/event', $data);
    }

    public function create()
    {
        return view('schedule/add');
    }

    public function store()
    {
        $data = $this->request->getPost();

        $this->db->table('event')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('event'))->with('success', 'Data Saved Successfully');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('event')->getWhere(['id_event' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['event'] = $query->getRow();
                return view('schedule/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $data = [
            'name_event' => $this->request->getVar('name_event'),
            'date_event' => $this->request->getVar('date_event'),
            'description_event' => $this->request->getVar('description_event'),
        ];

        $this->db->table('event')->where(['id_event' => $id])->update($data);
        return redirect()->to(site_url('event'))->with('success', 'Data Updated Successfully');
    }

    public function destroy($id)
    {
        $this->db->table('event')->where(['id_event' => $id])->delete();
        return redirect()->to(site_url('event'))->with('success', 'Data Deleted Successfully');
    }
}

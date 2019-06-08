<?php
class Linkdata extends CI_Controller
{

    public function del($record_id)
    {
        $this->load->model('linkdatamodel', "delete", TRUE);
        $this->delete->delLinkRecord($record_id);
        $this->load->library('user_agent');
        $this->load->helper('url');
        redirect($this->agent->referrer());
    }

    public function linkDetails($link_id)
    {
        $this->load->model('linkdatamodel','', TRUE);
        $query = $this->linkdatamodel->getLinkData($link_id);
        $row=$query->result();
        $myObj = new \stdClass();
        $myObj->id = $link_id;
        $myObj->url = $row[0]->url;
        $myObj->name = $row[0]->name;
        $myJSON = json_encode($myObj);
        echo($myJSON );
           
    }

    public function linkRecords($link_id)
    {
        $this->load->model('linkdatamodel','', TRUE);
        $query = $this->linkdatamodel->getLinkRecord($link_id);
        $count = 1;
        foreach ($query->result() as $row) {
            echo "<tr class='md-form'>";
            echo "<td>$count</td>";
            echo "<td>$row->date</td>";
            echo "<td>$row->ip</td>";
            echo "<td>$row->isp</td>";
            echo "<td> <form id='update' action='update.php' method='POST'><input type='text' name='country' value='$row->country' class='form-control form-control-sm'></td>";
            echo "<td><input type='text' name='city' value='$row->city' class='form-control form-control-sm'></td>";
            echo "<td><input type='text' name='province' value='$row->province' class='form-control form-control-sm'></td>";
            echo "<td><button type='submit' value=" . $row->rec_id . " class='btn btn-primary btn-sm' name='rec' id='rec'>Update</button></form></td>";
            echo "<td><form action='/linkdata/del/$row->rec_id' id='del_form' method=POST><button name='rec_id' type='submit' class='btn btn-warning btn-sm'>Delete</button></form></td>\n";
            echo "</tr>";
            $count++;
        }
    }

    public function linkGen(){
        $url=$this->input->post('url');
        $name=$this->input->post('linkname');
        $desc=$this->input->post('desc');
        $this->load->model('linkdatamodel','', TRUE);
        $id = $this->linkdatamodel->addRecord($url,$name,$desc);
        $link= "<a id='$id' onclick='redirect(this.id)' href='#'> Click Here </a>";
        $myObj = new \stdClass();
        $myObj->id =$id;
        $myObj->link = $link;
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }

    public function linkUpdate($id){
        $url=$this->input->post('url');
        $name=$this->input->post('linkname');
        $desc=$this->input->post('desc');
        $this->load->model('linkdatamodel','link', TRUE);
        $this->link->update($url,$name,$desc,$id);
        $this->load->library('user_agent');
        $this->load->helper('url');
        redirect($this->agent->referrer());
        
    }


    public function linkDel($id){
        $this->load->model('linkdatamodel','link', TRUE);
        $this->link->delete($id);
        $this->load->library('user_agent');
        $this->load->helper('url');
        redirect($this->agent->referrer());
    }

}

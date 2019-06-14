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
        if($query->num_rows()==0){
            echo "No One Has Clicked The Linked Yet";
            return;
        }
        foreach ($query->result() as $row) {
            echo "<tr class='md-form'>";
            echo "<td>$count</td>";
            echo "<td>$row->date</td>";
            echo "<td>$row->ip</td>";
            echo "<td>$row->isp</td>";
            echo "<td>$row->country</td>";
            echo "<td>$row->city</td>";
            echo "<td>$row->province</td>";
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

    public function click(){
        $Link_id=$this->input->post('Link_id');
        $Time=$this->input->post('Time');
        $IP=$this->input->post('IP');
        $Country=$this->input->post('Country');
        $City=$this->input->post('City');
        $ISP=$this->input->post('ISP');
        $Province=$this->input->post('Province');

        $this->load->model('linkdatamodel', "content", TRUE);
        echo $this->content->linkClick($Link_id, $IP, $City, $Country, $ISP, $Time, $Province);
    }

}

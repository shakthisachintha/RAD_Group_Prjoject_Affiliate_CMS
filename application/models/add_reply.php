 <?php
 class add_reply extends CI_Model
 {
     function saverecords($to)
     {
          
            $this->db->insert('reply',$to);
        }
 }
?>
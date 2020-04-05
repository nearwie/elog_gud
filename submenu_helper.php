<?php 
  
function menu_help($menu, $nama_table,$sub_menu, $icon)
{
	$CI =& get_instance();
	$data= $CI->db->get_where($nama_table,array('is_main_menu' => 0 ));
	if (!empty($data)) 
	{
		foreach ($data->result() as $menu) 
		{
			$sub_menu =$CI->db->get_where($nama_table,array('is_main_menu' => $menu->id));
			if($sub_menu->num_rows() > 0 )
			{
				echo '<li><a><i class="'.$menu->$icon.'"></i>' .ucwords($menu->menu).'  <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">':
				foreach ($sub_menu -> result() as $menu2) 
				{
					echo '<li>'.anchor($menu2->sub_menu, ucwords($menu2->sub_menu)).'</li>';
				}

        		echo '</ul></li>';
			}
			else 
				{echo '<li>'.anchor($menu->sub_menu, '<i class="'.$menu->sub_menu.'"><i> '.ucwords($menu->menu)).'</li>';
				}
		}
	}
	else
		{ 
			echo '';
		}
}


function combo_help($nama_inputan,$nama_id, $nama_table, $nama_field, $id_data, $selected)
{ 
	$CI =& get_instance();
	$data= $CI->db->get_where($nama_table,array('menu_aktif' => 1 ))->result();
	$combo = "<select name= '$nama_inputan', id='$nama_id, class='form=control'>";
	$combo .= '<option value="0"> Menu Utama</option>';

	foreach ($data as $row)
		{ 
			$combo .= "<option value='".$row->id_data."'";
			$combo .= $selected==$row->$id_data?"selected='selected'":"";
			$combo .= ">" . strtoupper($row->$nama_field )."</option>";

		}
		$combo .="</selected>";
		return $combo;
}

 ?>
<?php
/**
 * Clase para generar una table html con paginación de datos extraidos de Base de datos MYSQL O MSSQL
 */
require_once('config1.php');
class TablePagination{
	private $count;
	private $pages;
	private $prev;
	private $next;
	private $perpage = PER_PAGE;
	private $type = TYPE_PAGINATION;
	private $number;
	private $custom_count;
	function fetchTable($conn,$table,$sql,$get_pages=1,$inner=null,$where=NULL){
		$error = $result = FALSE;
		try {
			//test for count SELECT COUNT(*) AS rows FROM $table;
			//$total = $conn->query($this->custom_count)->fetch(PDO::FETCH_OBJ);
			$total = 20;
			$this->count = $total;
			$this->pages = ceil($this->count/$this->perpage);
			# default setting
			$data = array(
				'options' => array(
					'default' => 1,
					'min_range' => 1,
					'max_range' => $this->pages
				)
			);
			$this->number = trim($get_pages);
			$this->number = filter_var($this->number, FILTER_VALIDATE_INT, $data);
			$range = $this->perpage * ($this->number - 1);
			$this->prev = $this->number - 1;
			$this->next = $this->number + 1;
			$stmt="";
			$sql_query="";
			if ($this->type=="MYSQL") {
				if (isset($where)) {
					$sql_query="SELECT $sql FROM $table WHERE $where LIMIT :limits, :perpage";
				}else{
					$sql_query="$sql LIMIT :limits, :perpage";
				}
			}elseif ($this->type=="MSSQL") {
				if (isset($inner)) {
					$sql_query="SELECT TOP(:perpage) * FROM ($sql) AS TABLEWITHROWNUMBER WHERE ROWNUMBER > :limits;";
				}else{
					$sql_query="SELECT TOP(:perpage) * FROM (SELECT $sql FROM $table) AS TABLEWITHROWNUMBER WHERE ROWNUMBER > :limits;";
				}
			}
			$stmt = $conn->prepare($sql_query);
			$stmt->bindParam(':perpage', $this->perpage, PDO::PARAM_INT);
			$stmt->bindParam(':limits', $range, PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll();
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
		return $result;
	}
	function jsTable($id,$sort){
		print("<script type=\"text/javascript\">");
		print("var table = $('$id');");
		print("$('$sort').wrapInner('<span title=\"Sort this column\"/>').each(function(){var th = $(this),thIndex = th.index(),inverse = false;th.click(function(){table.find('td').filter(function(){return $(this).index() === thIndex;}).sortElements(function(a, b){return $.text([a]) > $.text([b]) ? inverse ? -1 : 1 : inverse ? 1 : -1; }, function(){return this.parentNode;});inverse = !inverse;});});");
		print("</script>");
	}
	function navTable($get_page){
		if ($this->count > 0) {
			if ($this->count >= $this->perpage+1) {
				if($this->number <= 1){
					print("<li><span>Previous</span></li>");
					print("<li><span>");
					print("Total pages (".$get_page." OF ".$this->pages.")");
					print("</span></li>");
					print("<li><a href=\"?page=".$this->next."\">Next</a></li>");
				}elseif ($this->number >= $this->pages) {
					print("<li><a href=\"?page=".$this->prev."\">Previous</a></li>");
					print("<li><span>");
					print("Total pages (".$get_page." OF ".$this->pages.")");
					print("</span></li>");
					print("<li><span>Next</span></li>");
				}else{
					print("<li><a href=\"?page=".$this->prev."\">Previous</a></li>");
					print("<li><span>");
					print("Total pages (".$get_page." OF ".$this->pages.")");
					print("</span></li>");
					print("<li><a href=\"?page=".$this->next."\">Next</a></li>");
				}
			}
		}else{
			print("<li><a href='#'>There is no record</a></li>");
		}
	}
	public function getCount(){
        return $this->count;
    }
    public function getPages(){
        return $this->pages;
    }
    public function getPrev(){
        return $this->prev;
    }
    public function getNext(){
        return $this->next;
    }
    public function getNumber(){
        return $this->number;
    }
    public function getPerpage(){
        return $this->perpage;
    }
    public function setPerpage($perpage){
		$this->perpage = $perpage;
	}
	public function setType($type){
		$this->type = $type;
	}
	public function setCustom_count($custom_count){
		$this->custom_count = $custom_count;
	}
}
?>
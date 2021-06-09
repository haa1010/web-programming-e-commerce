<?php

class Product extends Model
{
    function get_one($alias)
    {
        return $this->select_by_alias($alias);
    }
    function get_quantity($id, $color, $size)
    {
        $objArr =  json_decode($this->select($id)['Product']['Quantity']);
        foreach ($objArr as $obj) {
            $obj = get_object_vars($obj);
            if ($obj['color'] === $color && $obj['size'] === $size) {
                return $obj['qty'];
            }
        }
        return 0;
    }
    function update_quantity($item)
    {
        $objArr =  json_decode($this->select($item['id'])['Product']['Quantity'], true);
        foreach ($objArr as $i => $obj) {
            if ($obj['color'] === $item['color'] && $obj['size'] === $item['size']) {
                $objArr[$i]['qty'] = strval($objArr[$i]['qty'] - $item['number']);
            }
        }
        $query = "update `" . $this->_table . "` set `Quantity` = '" . json_encode($objArr) . "' where `id`=" . $this->escape($item['id']) . ";";
        $this->query($query);
    }

    function checkCart()
    {
        $result = "";
        foreach ($_SESSION['cart'] as $pid => $item) {
            $left = $this->get_quantity($item['id'], $item['color'], $item['size']);
            if ($item['number'] > intval($left)) {
                $result += "Product " . str_replace("-", " ", $pid) . "Only have " . $left . " item" . "\n";
            }
        }
        return $result;
    }

    function insert_one($data)
    {
        $query = "insert into `" . $this->_table . "`(name, CategoryId, SubCategoryId, Description, Price, Color, Material, Size, Createdate ,EditDate ,isSaleOff ,Percent_off ,Image1 ,Image2, Image3, Image4, Alias, Quantity)
        value ('" . $this->escape($data['Name']) . "'," . $data['CategoryId'] . "," . $data['SubCategoryId'] . ",'" .
            $this->escape(htmlsan($data['Description'])) . "'," . $data['Price'] . ",'" . $this->escape($data['Color']) . "','" .
            $this->escape(htmlsan($data['Material'])) . "','" . $this->escape($data['Size']) . "',STR_TO_DATE('" . date("Y-m-d") . "','%Y-%m-%d'),STR_TO_DATE('" . date("Y-m-d") . "','%Y-%m-%d')," .
            $this->escape(isset($data['isSaleOff']) ? 1 : 0) . "," .
            $this->escape($data['Percent_off']) . ",'" . $this->escape($data['Image1']) . "','" . $this->escape($data['Image2']) . "','" .
            $this->escape($data['Image3']) . "','" . $this->escape($data['Image4']) . "','" . $this->escape($data['Alias']) . "','" .
            $this->escape($data['Quantity']) . "');";
        $this->query($query);
    }
    function update_one($data)
    {
        $query = "update `" . $this->_table . "` set 
        `Description` = '" . $this->escape(htmlsan($data['Description'])) . "'," .
            "`Price` = "  . $this->escape($data['Price']) . "," .
            "`Material` = '"  . $this->escape(htmlsan($data['Material']))  . "'," .
            "`Percent_off` = "  . $this->escape($data['Percent_off'])  . "," .
            "`Image1` = '"  . $this->escape($data['Image1'])  . "'," .
            "`Image2` = '"  . $this->escape($data['Image2'])  . "'," .
            "`Image3` = '"  . $this->escape($data['Image3'])  . "'," .
            "`Image4` = '"  . $this->escape($data['Image4'])  . "'," .
            "`Quantity` = '" . $this->escape($data['Quantity']) . "' where `Id`= " . $this->escape($data["Id"]) . ";";
        $this->query($query);
    }

    function page($offset, $limit)
    {
        $query = "select * from `" . $this->_table . "` limit " . $this->escape($offset) . "," . $this->escape($limit) . ";";
        return $this->query($query);
    }
    function getTotal()
    {
        return $this->query("select count(*) as total from `" . $this->_table . "`;", 1);
    }
}

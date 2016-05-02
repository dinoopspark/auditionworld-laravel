<?php

class Relation extends Eloquent {

    protected $table = 'relations';
    protected $guarded = array('id');
    protected $fillable = array('relation_name', 'first', 'second');
    public $timestamps = false;

    const MAX_JOIN_TABLE = 2;

    static function add($relation_name, $first, $second) {

        $relation = self::where('relation_name', $relation_name)
                ->where('first', $first)
                ->where('second', $second)
                ->first();

        if (isset($relation->id)) {
            return $relation->id;
        }

        $relation = new self;
        $relation->relation_name = $relation_name;
        $relation->first = $first;
        $relation->second = $second;
        $relation->save();

        return $relation->id;
    }

    static function remove($relation_name, $first, $second) {
        $relation = self::where('relation_name', $relation_name)
                ->where('first', $first)
                ->where('second', $second)
                ->first();

        if (isset($relation->id)) {
            $relation->delete();
            return $relation->id;
        }
        return false;
    }

    static function select($relation_name, $first = null, $second = null) {
        if (is_null($first) && is_null($second)) {
            return false;
        }

        if (is_null($first)) {
            return $relation = self::where('relation_name', $relation_name)
                    ->where('second', $second)
                    ->lists('first');
        }

        if (is_null($second)) {
            return $relation = self::where('relation_name', $relation_name)
                    ->where('first', $first)
                    ->lists('second');
        }
    }

    static function change_relation_name($relation_name, $new_relation_name) {
        $affectedRows = self::where('relation_name', $relation_name)->update(array('relation_name' => $new_relation_name));
        return $affectedRows;
    }

    static function reljoin($relation_name, $table, $first = null, $second = null, $list = null) {

        if (is_null($first) && is_null($second)) {
            return false;
        }


        //multiple tables
        if (strpos($table, '.') !== false) {

            $tables = explode('.', $table);

            if (count($tables) == self::MAX_JOIN_TABLE) {
                $tables_one = $tables[0];
                $tables_two = $tables[1];
            } else {
                return false;
            }

            if (!is_null($first) && !is_null($second)) {

                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($tables_one, 'relations.first', '=', $tables_one . '.id')
                                ->join($tables_two, 'relations.second', '=', $tables_two . '.id')
                                ->where('relations.first', '=', $first)
                                ->where('relations.second', '=', $second)
                                ->get();
            } elseif (!is_null($first)) {

                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($tables_one, 'relations.first', '=', $tables_one . '.id')
                                ->join($tables_two, 'relations.second', '=', $tables_two . '.id')
                                ->where('relations.first', '=', $first)
                                ->get();
            } elseif (!is_null($second)) {
                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($tables_one, 'relations.first', '=', $tables_one . '.id')
                                ->join($tables_two, 'relations.second', '=', $tables_two . '.id')
                                ->where('relations.second', '=', $second)
                                ->get();
            } else {
                return false;
            }
        }


        //get the specified column
        if (!is_null($list)) {


            if (!is_null($first) && !is_null($second)) {
                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($table, 'relations.first', '=', $table . '.id')
                                ->where('relations.first', '=', $first)
                                ->where('relations.second', '=', $second)
                                ->lists($table . '.' . $list);
            } elseif (!is_null($first)) {
                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($table, 'relations.second', '=', $table . '.id')
                                ->where('relations.first', '=', $first)
                                ->lists($table . '.' . $list);
            } elseif (!is_null($second)) {
                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($table, 'relations.first', '=', $table . '.id')
                                ->where('relations.second', '=', $second)
                                ->lists($table . '.' . $list);
            } else {
                return false;
            }
            
        } else {


            if (!is_null($first) && !is_null($second)) {
                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($table, 'relations.first', '=', $table . '.id')
                                ->where('relations.first', '=', $first)
                                ->where('relations.second', '=', $second)
                                ->get();
            } elseif (!is_null($first)) {
                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($table, 'relations.second', '=', $table . '.id')
                                ->where('relations.first', '=', $first)
                                ->get();
            } elseif (!is_null($second)) {
                return self::where('relations.relation_name', '=', $relation_name)
                                ->join($table, 'relations.first', '=', $table . '.id')
                                ->where('relations.second', '=', $second)
                                ->get();
            } else {
                return false;
            }
        }
    }

}

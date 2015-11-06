for f in team/*;do
	echo "adding $f"
	n="${f/team\//}"
	x=`wp post create "$f" --post_title="$n" --post_status=publish --porcelain`; 
	echo "id $x"
	i="${f/team/images}"
	wp media import "$i".jpg --post_id=`echo $x` --featured_image
	wp post term add `echo $x` category team
done

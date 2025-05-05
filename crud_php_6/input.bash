
read -p "Enter the base number: " base
read -p "Enter the exponent: " exponent

result=$(echo "$base ^ $exponent" | bc -l)

echo "Result: $result"

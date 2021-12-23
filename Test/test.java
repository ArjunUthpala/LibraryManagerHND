public class Stack {
    int stptr;

    void init() {
        stptr = -1;
    }

    void push(String T[], String item) {
        if (stptr == T.length - 1)
            System.out.println("Stack overflow!");
        else {
            stptr++;
            T[stptr] = item;
        }
    }// end push

    String pop(String T[]) {
        String item;
        if (stptr == -1) {
            System.out.println("Stack  empty");
            return null;
        } else {
            item = T[stptr];
            stptr--;
            return item;
        }
    } // end pop

    public static void main(String arg[]) {
        String T[] = new String[100];
        Stack s1 = new Stack();
        s1.init();
        s1.push(T, "Lavender");
        s1.push(T, "Jasmine");
        s1.push(T, "Lotus");
        s1.push(T, "Lilly");
        String a = s1.pop(T);
        System.out.println(a);
        String b = s1.pop(T);
        System.out.println(b);

    }
}// end Stack
